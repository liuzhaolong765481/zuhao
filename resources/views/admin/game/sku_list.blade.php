@include('admin._include.header')
<body>
<style>
    .layui-table-cell {
        height: auto;
        line-height: 20px;
    }
</style>
<div class="layui-fluid">
    <div class="larry-container">
        <div class="layui-row layui-col-space15 larryms-data-top">
            <div class="layui-col-xs12 layui-col-sm12 layui-col-md12 layui-col-lg12">
                <script type="text/html" id="tools">
                    <button type="button" class="layui-btn" lay-event="add">添加游戏sku</button>
                </script>
                <table lay-filter="sku_table" class="layui-table" lay-data="{height:'full-155',cellMinWidth:95,url:'{{url('admin/game/sku-list')}}', page:true, id:'sku_table',toolbar:'#tools',defaultToolbar:[]}">
                    <thead>
                    <tr>
                        <th lay-data="{field:'id', align:'center',sort: true}">ID</th>
                        <th lay-data="{field:'game_name',align:'center'}">游戏名称</th>
                        <th lay-data="{field:'sku_name',align:'center'}">sku名称</th>
                        <th lay-data="{toolbar:'#toolbarDemo',width:200,align:'center'}">sku图标</th>
                        <th lay-data="{title:'操作',templet:'#listBar',align:'center'}">操作</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>



<script type="text/html" id="toolbarDemo">
    <button type="button" class="layui-btn layui-btn-normal layui-btn-xs" lay-event="show">查看</button>
</script>


<script type="text/html" id="listBar">
    <a class="layui-btn layui-btn-xs"  data-url="{{url('admin/game/add-sku')}}?id=@{{ d.id }}" lay-event="info">修改</a>
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




        table.on('toolbar(sku_table)', function(obj){
            var that = this;
            if (obj.event == 'add') {
                var index = layer.open({
                    title: "添加游戏",
                    type: 2,
                    area: ['760px', '550px'],
                    scrollbar:true,
                    content: "{{url('admin/game/add-sku')}}",
                    end:function () {
                        $(that).removeAttr("data-flag");
                        layui.cache.layerIndex = null;
                        table.reload('sku_table')
                    }
                });
                // layer.full(index);
            }
        });

        table.on('tool(sku_table)', function(obj){
            var data = obj.data;
            if (obj.event == "show") {
                var jsondata = data;
                var arr = [];
                var obj = {
                    'alt':jsondata.sku_name,
                    'pic':jsondata.id+"_id",
                    'src':jsondata.sku_icon,
                    'thumb':jsondata.sku_icon
                };
                arr.push(obj);
                var json = {
                    'title':jsondata.sku_name,
                    'id':jsondata.id,
                    'start':0,
                    'data':arr
                };
                layer.photos({
                    photos: json
                    ,anim:2
                });
            }

        });


    });




</script>
</body>

@include('admin._include.footer')


