@include('admin._include.header')

<body>
<div class="layui-fluid">
    <div class="layui-card">

        <div class="layui-card-body">

            <table lay-filter="user_table" class="layui-table" lay-data="{height:'full-155',cellMinWidth:95,url:'{{url('admin/auth/manager-list')}}', page:true, id:'user_table'}">
                <thead>
                <tr>
                    <th lay-data="{field:'id', align:'center'}">ID</th>
                    <th lay-data="{field:'name',align:'center'}">账号</th>
                    <th lay-data="{field:'mobile',align:'center'}">手机号</th>
                    <th lay-data="{field:'email',align:'center'}">邮箱</th>
                    <th lay-data="{field:'create_time',align:'center'}">添加时间</th>
                    <th lay-data="{width:140,title:'操作',templet:'#listBar',align:'center'}">操作</th>
                </tr>
                </thead>
            </table>

        </div>
    </div>
</div>


<script type="text/html" id="listBar">
    <a class="layui-btn layui-btn-xs layui-btn-normal" data-url="{{url('auth/password')}}?id=@{{ d.id }}" lay-event="recharge">修改密码</a>
</script>

<script>
    layui.config({
        base: "/plugin/layuiadmin/"  //静态资源所在路径
    }).extend({
        index: 'lib/index' //主入口模块
    }).use(['index', 'table'], function(){
        var $ = layui.$,
            table = layui.table;


        table.on('tool(user_table)', function(obj){
            var data = obj.data;
            var that = this;
            if (obj.event == 'recharge') {
                var url = $(this).data('url');
                var that = this;
                index = layer.open({
                    title: data.name+" 修改密码",
                    type: 2,
                    area: ['760px', '550px'],
                    content: url,
                    end: function() {
                        $(that).removeAttr("data-flag");
                        layui.cache.layerIndex = null;
                        table.reload('article')
                    }
                });
            }

        });


    });



</script>
</body>

@include('admin._include.footer')