@include('admin._include.header')

<body>

<div class="layui-fluid">
    <div class="larry-container">
        <div class="layui-row layui-col-space15 larryms-data-top">
            <div class="layui-col-xs12 layui-col-sm12 layui-col-md12 layui-col-lg12">
                <script type="text/html" id="tools">
                    <button type="button" class="layui-btn" lay-event="add">添加账号</button>
                </script>
                <table lay-filter="account_table" class="layui-table" lay-data="{height:'full-155',cellMinWidth:95,url:'{{url('admin/account/account-list')}}', page:true, id:'account_table',toolbar:'#tools',defaultToolbar:[]}">
                    <thead>
                    <tr>
                        <th lay-data="{field:'id', align:'center'}">ID</th>
                        <th lay-data="{field:'game_name',align:'center'}">所属游戏</th>
                        <th lay-data="{field:'user_phone',align:'center'}">发布用户</th>
                        <th lay-data="{field:'spu',align:'center'}">游戏区服</th>
                        <th lay-data="{field:'title',align:'center'}">发布标题</th>
                        <th lay-data="{align:'center',templet:'#account_status'}">是否上架</th>
                        <th lay-data="{field:'lease_times',align:'center'}">浏览次数</th>
                        <th lay-data="{field:'lease_hour',align:'center'}">出租次数</th>
                        <th lay-data="{field:'lease_hour',align:'center'}">累计出租时长/小时</th>
                        <th lay-data="{title:'操作',templet:'#listBar',align:'center'}">操作</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/html" id="account_status">
    @{{# if (d.is_upper == 0) { }}
    <input type="checkbox" checked="true" lay-filter="status" value="@{{d.id}}" lay-skin="switch" lay-text="是|否">
    @{{# } else {}}
    <input type="checkbox"  value="@{{d.id}}" lay-filter="status" lay-skin="switch" lay-text="是|否">
    @{{# }}}
</script>

<script type="text/html" id="toolbarDemo">
    <img src="@{{ d.image }}" width="100px" height="50px" layer-src="@{{ d.image }}" alt="" lay-event="show">
</script>

<script type="text/html" id="listBar">
    <a class="layui-btn layui-btn-xs"  data-url="{{url('admin/application/article-add')}}?id=@{{ d.id }}" lay-event="info">修改</a>
</script>

<script>
    layui.config({
        base: "/plugin/layuiadmin/"  //静态资源所在路径
    }).extend({
        index: 'lib/index' //主入口模块
    }).use(['index', 'table'], function(){
        var $ = layui.$,
            form = layui.form,
            table = layui.table;

        table.on('toolbar(account_table)', function(obj){
            var that = this;
            if (obj.event == 'add') {
                var index = layer.open({
                    title: "添加文章",
                    type: 2,
                    area: ['760px', '800px'],
                    scrollbar:true,
                    content: "{{url('admin/application/article-add')}}",
                    end:function () {
                        $(that).removeAttr("data-flag");
                        layui.cache.layerIndex = null;
                        table.reload('account_table')
                    }
                });
                layer.full(index);
            }
        });

        table.on('tool(account_table)', function(obj){
            var data = obj.data;
            var that = this;
            if (obj.event == "show") {
                var jsondata = data;
                var arr = [];
                var obj = {
                    'alt':jsondata.cate_name,
                    'pic':jsondata.id+"_id",
                    'src':jsondata.image,
                    'thumb':jsondata.image
                };
                arr.push(obj);
                var json = {
                    'title':jsondata.cate_name,
                    'id':jsondata.id,
                    'start':0,
                    'data':arr
                };
                layer.photos({
                    photos: json
                    ,anim:5
                });
            } else if (obj.event == 'info') {
                var url = $(this).data('url');
                index = layer.open({
                    title: data.title,
                    type: 2,
                    area: ['760px', '800px'],
                    content: url,
                    end: function() {
                        $(that).removeAttr("data-flag");
                        layui.cache.layerIndex = null;
                        table.reload('account_table')
                    }
                });
                layer.full(index);
            }

        });


    });




</script>
</body>

@include('admin._include.footer')


