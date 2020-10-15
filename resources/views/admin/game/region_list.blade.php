@include('admin._include.header')

<body>

<div class="layui-fluid">
    <div class="larry-container">
        <div class="layui-row layui-col-space15 larryms-data-top">
            <div class="layui-col-xs12 layui-col-sm12 layui-col-md12 layui-col-lg12">
                <script type="text/html" id="tools">
                    <button type="button" class="layui-btn" lay-event="add">添加大区</button>
                </script>
                <table lay-filter="region_table" class="layui-table" lay-data="{height:'full-155',cellMinWidth:95,url:'{{url('admin/game/region-list')}}?game_id={{$game_id}}', page:true, id:'region_table',toolbar:'#tools',defaultToolbar:[]}">
                    <thead>
                    <tr>
                        <th lay-data="{field:'region_name',align:'center'}">大区名称</th>
                        <th lay-data="{title:'操作',templet:'#listBar',align:'center'}">操作</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/html" id="listBar">
    <a class="layui-btn layui-btn-xs"  data-url="{{url('admin/game/add-region')}}?id=@{{ d.id }}&game_id={{$game_id}}" lay-event="info">修改</a>
    <a class="layui-btn layui-btn-xs layui-btn-warm"  data-url="{{url('admin/game/add-service')}}?region_id=@{{ d.id }}" lay-event="add_service">服务器</a>
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

        table.on('toolbar(region_table)', function(obj){
            var that = this;
            if (obj.event == 'add') {
                var index = layer.open({
                    title: "添加类型",
                    type: 2,
                    area: ['460px', '250px'],
                    scrollbar:true,
                    content: "{{url('admin/game/add-region')}}?game_id={{$game_id}}",
                    end:function () {
                        $(that).removeAttr("data-flag");
                        layui.cache.layerIndex = null;
                        table.reload('region_table')
                    }
                });
                // layer.full(index);
            }
        });

        table.on('tool(region_table)', function(obj){
            var data = obj.data;
            var that = this;
            if (obj.event == 'info') {
                var url = $(this).data('url');
                index = layer.open({
                    title: data.region_name,
                    type: 2,
                    area: ['460px', '250px'],
                    content: url,
                    end: function() {
                        $(that).removeAttr("data-flag");
                        layui.cache.layerIndex = null;
                        table.reload('region_table')
                    }
                });
            }else if(obj.event == 'add_service'){
                var url = $(this).data('url');
                index = layer.open({
                    title: data.region_name + '-服务器',
                    type: 2,
                    area: ['760px', '550px'],
                    content: url,
                    end: function() {
                        $(that).removeAttr("data-flag");
                        layui.cache.layerIndex = null;
                        table.reload('region_table')
                    }
                });

            }


        });


    });




</script>
</body>

@include('admin._include.footer')


