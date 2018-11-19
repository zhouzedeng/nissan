layui.use(['form', 'layedit', 'laydate','flow'], function(){
    var form = layui.form
        ,layer = layui.layer
        ,layedit = layui.layedit
        ,laydate = layui.laydate
        ,flow = layui.flow ;
    //日期
    laydate.render({
        elem: '#end_time',
        type:"datetime"
    });
    //日期
    laydate.render({
        elem: '#start_time',
        type:"datetime"
    });

    //创建一个编辑器
    var editIndex = layedit.build('LAY_demo_editor');

    //自定义验证规则
    form.verify({
        content: function(value){
            layedit.sync(editIndex);
        }
    });
    var activity_goods = [];
    $.ajax({
        type: "get",
        url: "fing_activity_goods?activity_id=" + $('#activity_id').val(),
        data: {},
        dataType: "json",
        success: function(data){
            activity_goods = (data.data.goods_id).split(",");
            flow.load({
                elem: '#goodslist' //流加载容器
                ,scrollElem: '#goodslist' //滚动条所在元素，一般不用填，此处只是演示需要。
                ,done: function(page, next){ //执行下一页的回调
                    var limit = 100000;
                    //加载商品列表
                    $.ajax({
                        type: "get",
                        url: "goods_list",
                        data: {'page':page,'limit':limit},
                        dataType: "json",
                        success: function(data){
                            var lis = [];
                            for (var i = 0; i < data.data.length; i++) {
                                if(activity_goods.indexOf(String(data.data[i].id)) != -1){
                                    lis.push('<input type="checkbox"  checked name="goods_id['+data.data[i].id+']" title="'+data.data[i].goods_name+'">')
                                }else{
                                    lis.push('<input type="checkbox"   name="goods_id['+data.data[i].id+']" title="'+data.data[i].goods_name+'">')
                                }
                            }
                            next(lis.join(''), page < (data.count/10));
                            //$('#goodslist').html(lis);
                            form.render();
                        }
                    });
                }
            });
        }
    });



    //监听提交
    form.on('submit(mycommit)', function(data){
        var data_obj = data.field;
        $.ajax({
            type: "post",
            url: "activity_edit",
            data: data_obj,
            dataType: "json",
            success: function(data){
               if (0 != data.code) {
                   layer.alert(data.msg + ',错误码:'+ data.code);
               } else {
                   layer.open({
                       content: '修改成功',
                       yes: function(){
                           window.location.href = "activity_index";
                       }
                   });
               }
            }
        });
        return false;
    });
});

layui.use('upload', function(){
    var $ = layui.jquery
        ,upload = layui.upload;

    //多文件列表示例
    var demoListView = $('#demoList')
        ,uploadListIns = upload.render({
        elem: '#testList'
        ,url: 'upload_upload'
        ,accept: 'file'
        ,multiple: true
        ,auto: false
        ,bindAction: '#testListAction'
        ,choose: function(obj){
            var files = this.files = obj.pushFile(); //将每次选择的文件追加到文件队列
            //读取本地文件
            obj.preview(function(index, file, result){
                $('.storage_bg_img_url').html('');
                var tr = $(['<tr id="upload-'+ index +'">'
                    ,'<td>'+ file.name +'</td>'
                    ,'<td>'+ (file.size/1014).toFixed(1) +'kb</td>'
                    ,'<td><img src="'+result+'"></td>'
                    ,'<td>等待上传</td>'
                    ,'<td>'
                    ,'<button class="layui-btn layui-btn-mini demo-reload layui-hide">重传</button>'
                    ,'<button class="layui-btn layui-btn-mini layui-btn-danger demo-delete">删除</button>'
                    ,'</td>'
                    ,'</tr>'].join(''));

                //单个重传
                tr.find('.demo-reload').on('click', function(){
                    obj.upload(index, file);
                });

                //删除
                tr.find('.demo-delete').on('click', function(){
                    delete files[index]; //删除对应的文件
                    tr.remove();
                    uploadListIns.config.elem.next()[0].value = ''; //清空 input file 值，以免删除后出现同名文件不可选
                });

                demoListView.append(tr);
            });
        }
        ,done: function(res, index, upload){
            if(res.code == 0){ //上传成功
                var tr = demoListView.find('tr#upload-'+ index)
                    ,tds = tr.children();
                tds.eq(3).html('<span style="color: #5FB878;">上传成功</span>');
                tds.eq(4).html(''); //清空操作
                $('#img').val(res.data.path);
                return delete this.files[index]; //删除文件队列已经上传成功的文件
            }
            this.error(index, upload);
        }
        ,error: function(index, upload){
            var tr = demoListView.find('tr#upload-'+ index)
                ,tds = tr.children();
            tds.eq(2).html('<span style="color: #FF5722;">上传失败</span>');
            tds.eq(3).find('.demo-reload').removeClass('layui-hide'); //显示重传
        }
    });
});
