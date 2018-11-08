layui.use('table', function(){
    var table = layui.table;
    //方法级渲染
    table.render({
        elem: '#LAY_table_user'
        ,url: 'cut_list'
        ,cellMinWidth: 80 //全局定义常规单元格的最小宽度，layui 2.2.1 新增
        ,cols: [[
            {checkbox: true, fixed: true}
            ,{field:'id', title: 'ID', sort: true, fixed: true}
            ,{field:'user_id', title: '用户ID', sort: true}
            ,{field:'user_name', title: '用户名称', sort: true}
            ,{field:'activity_id', title: '活动ID', sort: true}
            ,{field:'activity_name', title: '活动名称', sort: true}
            ,{field:'goods_id', title: '商品ID', sort: true}
            ,{field:'goods_name', title: '商品名称', sort: true}
            ,{field:'need_cut_num', title: '需要砍价的次数', sort: true}
            ,{field:'already_cut_num', title: '已砍价次数', sort: true}
            ,{field:'is_finish', templet:function(data){
                 if (data.is_finish == 1) {
                     return '已完成';
                 } else {
                     return '未完成';
                 }
                } ,title: '是否已完成砍价', sort: true}
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
