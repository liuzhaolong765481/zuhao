@include('admin._include.header')

<body>

<div class="layui-fluid">
    <div class="larry-container">
        <div class="layui-row layui-col-space15 larryms-data-top">
            <div class="layui-col-xs12 layui-col-sm12 layui-col-md12 layui-col-lg12">
                <script type="text/html" id="tools">
                    <button type="button" class="layui-btn" lay-event="add">添加类型</button>
                </script>
                <table lay-filter="cate_table" class="layui-table" lay-data="{height:'full-155',cellMinWidth:95,url:'{{url('admin/game/cate-list')}}', page:true, id:'cate_table',toolbar:'#tools',defaultToolbar:[]}">
                    <thead>
                    <tr>
                        <th lay-data="{field:'id', align:'center'}">ID</th>
                        <th lay-data="{field:'cate_name',align:'center'}">类型名称</th>
                        <th lay-data="{toolbar:'#toolbarDemo',width:200,align:'center'}">分类图片</th>
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
    <a class="layui-btn layui-btn-xs"  data-url="{{url('admin/game/add-cate')}}?id=@{{ d.id }}" lay-event="info">修改</a>
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

        table.on('toolbar(cate_table)', function(obj){
            var that = this;
            if (obj.event == 'add') {
                var index = layer.open({
                    title: "添加类型",
                    type: 2,
                    area: ['760px', '550px'],
                    scrollbar:true,
                    content: "{{url('admin/game/add-cate')}}",
                    end:function () {
                        $(that).removeAttr("data-flag");
                        layui.cache.layerIndex = null;
                        table.reload('cate_table')
                    }
                });
                // layer.full(index);
            }
        });

        table.on('tool(cate_table)', function(obj){
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
                    ,anim:2
                });
            } else if (obj.event == 'info') {
                var url = $(this).data('url');
                index = layer.open({
                    title: data.cate_name,
                    type: 2,
                    area: ['760px', '550px'],
                    content: url,
                    end: function() {
                        $(that).removeAttr("data-flag");
                        layui.cache.layerIndex = null;
                        table.reload('cate_table')
                    }
                });
            }

        });


    });




</script>
</body>

@include('admin._include.footer')


