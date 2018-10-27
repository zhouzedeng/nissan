layui.use('table', function(){
    var table = layui.table;
    //方法级渲染
    table.render({
        elem: '#LAY_table_user'
        ,url: 'list'
        ,cellMinWidth: 80 //全局定义常规单元格的最小宽度，layui 2.2.1 新增
        ,cols: [[
            {checkbox: true, fixed: true}
            ,{field:'id', title: 'ID', sort: true, fixed: true}
            ,{field:'name', title: '用户名'}
            ,{field:'age', title: '年龄', sort: true}
            ,{field:'sex', templet:function(data){
                   return  data.sex == 1 ? '男'  : '女';
                } ,title: '性别', sort: true}
            ,{field:'email', title: '邮箱', sort: true}
            ,{field:'updated_at', title: '最后一次修改时间', sort: true}
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
                obj.del();
                layer.close(index);
            });
        } else if(obj.event === 'edit'){
            layer.alert('编辑行：<br>'+ JSON.stringify(data))
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
