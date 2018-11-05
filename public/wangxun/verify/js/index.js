layui.use('table', function(){
    var table = layui.table;
    //方法级渲染
    table.render({
        elem: '#LAY_table_user'
        ,url: 'verify_list'
        ,cellMinWidth: 80 //全局定义常规单元格的最小宽度，layui 2.2.1 新增
        ,cols: [[
            {checkbox: true, fixed: true}
            ,{field:'id', title: 'ID', sort: true, fixed: true}
            ,{field:'theme', title: '主题'}
            ,{field:'brand', title: '品牌'}
            ,{field:'bg_img_url', title: '活动背景图', sort: true}
            ,{field:'seller_name', title: '经销商', sort: true}
            ,{field:'check_status', templet:function(data){
                if (data.check_status == 0) {
                    return '未审核';
                } else if(data.check_status == 1) {
                    return '审核通过';
                } else {
                    return '审核未通过';
                }
                } ,title: '审核状态', sort: true}
            ,{field:'check_remark', title: '审核备注', sort: true}
            ,{field:'desc', title: '活动说明', sort: true}
            ,{field:'created_at', title: '创建时间', sort: true}
            ,{field:'created_at', title: '操作', toolbar: '#bar'}

        ]]
        ,id: 'testReload'
        ,page: true
    });

    //监听工具条
    table.on('tool(user)', function(obj){           // user 指的是页面中 lay-filter="user"的user
        var data = obj.data;
        if(obj.event === 'detail'){
            layer.msg('ID：'+ data.id + ' 的查看操作');
        } else if(obj.event === 'del'){
            layer.confirm('真的删除行么', function(index){
                $.ajax({
                    type: "POST",
                    data: {'id':data.id},
                    url:'activity_del',
                    dataType: "json",
                    success: function(data){
                        if (0 != data.code) {
                            layer.alert(data.msg + ',错误码:'+ data.code);
                        } else {
                            layer.open({
                                content: '删除成功',
                                yes: function(){
                                    obj.del();
                                    window.location.href = "activity_index";
                                }
                            });
                        }
                    }
                });
                obj.del();
                layer.close(index);
            });
        } else if(obj.event === 'pass'){
            layer.open({
                content: '审核通过后活动即会生效，确认通过吗？',
                yes: function(){
                    $.ajax({
                        type: "POST",
                        data: {
                            'id':data.id,
                            'status':1
                        },
                        url:'verify_check',
                        dataType: "json",
                        success: function(data){
                            if (0 != data.code) {
                                layer.alert(data.msg + ',错误码:'+ data.code);
                            } else {
                                layer.open({
                                    content: '操作成功',
                                    yes: function(){
                                        obj.del();
                                        window.location.href = "verify_index";
                                    }
                                });
                            }
                        }
                    });
                }
            });
        } else if(obj.event === 'no_pass'){
            layer.prompt({
                formType: 0,
                value: '',
                title: '请输入审核不通过的原因（可不填）'
            }, function(value,index){
                $.ajax({
                    type: "POST",
                    data: {
                        'remark':value,
                        'id' : data.id,
                        'status':2
                    },
                    url:'verify_check',
                    dataType: "json",
                    success: function(data){
                        if (0 != data.code) {
                            layer.alert(data.msg + ',错误码:'+ data.code);
                        } else {
                            layer.open({
                                content: '操作成功',
                                yes: function(){
                                    obj.del();
                                    window.location.href = "verify_index";
                                }
                            });
                        }
                    }
                });
            });
        }
    });

    var $ = layui.$, active = {
        reload: function(){
            var name = $('#name').val();
            var uid = $('#uid').val();
            //执行重载
            table.reload('testReload', {
                page: {
                    curr: 1 //重新从第 1 页开始
                }
                ,where: {
                    uid: uid,
                    name: name
                }
            });
        }
    };

    $('#export').on('click', function(){
        var name = $('#name').val();
        var uid = $('#uid').val();
        window.location.href = export_url + "?name=" + name + "&uid=" + uid;
    });

    $('.search .layui-btn').on('click', function(){
        var type = $(this).data('type');
        active[type] ? active[type].call(this) : '';
    });
});
