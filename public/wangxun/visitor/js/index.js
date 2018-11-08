layui.use('table', function(){
    var table = layui.table;
    //方法级渲染
    table.render({
        elem: '#LAY_table_user'
        ,url: 'visitor_list'
        ,cellMinWidth: 80 //全局定义常规单元格的最小宽度，layui 2.2.1 新增
        ,cols: [[
            {checkbox: true, fixed: true}
            ,{field:'id', title: 'ID', sort: true, fixed: true}
            ,{field:'wx_name', title: '微信名称', sort: true}
            ,{field:'wx_head_img_url', templet:function(data){
                    return '<img style="width: 300px;height: 300px;" src="' + data.wx_head_img_url + '">'
                } ,title: '微信头像', sort: true}

            ,{field:'wx_openid', title: '微信ID', sort: true}
            ,{field:'seller_id', title: '经销商ID', sort: true}
            ,{field:'created_at', title: '创建时间', sort: true}

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
        } else if(obj.event === 'edit'){
            //layer.alert('编辑行：<br>'+ JSON.stringify(data))
            window.location.href =  "activity_edit?id=" + data.id ;
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
