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
                    <button type="button" class="layui-btn" lay-event="add">添加游戏</button>
                </script>
                <table lay-filter="game_table" class="layui-table" lay-data="{height:'full-155',cellMinWidth:95,url:'{{url('admin/game/game-list')}}', page:true, id:'game_table',toolbar:'#tools',defaultToolbar:[]}">
                    <thead>
                    <tr>
                        <th lay-data="{field:'id', align:'center',sort: true}">ID</th>
                        <th lay-data="{field:'name',align:'center'}">游戏名称</th>
                        <th lay-data="{field:'cate_string',align:'center'}">游戏分类</th>
                        <th lay-data="{field:'tag',align:'center'}">游戏标签</th>
                        <th lay-data="{field:'description',align:'center'}">游戏描述</th>
                        <th lay-data="{align:'center',templet:'#game_status'}">是否上架</th>
                        <th lay-data="{align:'center',templet:'#is_hot'}">是否热门</th>
                        <th lay-data="{field:'sort',align:'center',sort: true}">排序</th>
                        <th lay-data="{toolbar:'#toolbarDemo',width:200,align:'center'}">封面图片</th>
                        <th lay-data="{title:'操作',templet:'#listBar',align:'center'}">操作</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>


<script type="text/html" id="game_status">
    @{{# if (d.status == 1) { }}
    <input type="checkbox" checked="true" lay-filter="status" value="@{{d.id}}" lay-skin="switch" lay-text="是|否">
    @{{# } else {}}
    <input type="checkbox"  value="@{{d.id}}" lay-filter="status" lay-skin="switch" lay-text="是|否">
    @{{# }}}
</script>


<script type="text/html" id="is_hot">
    @{{# if (d.is_hot == 1) { }}
    <input type="checkbox" checked="true" lay-filter="is_hot" value="@{{d.id}}" lay-skin="switch" lay-text="是|否">
    @{{# } else {}}
    <input type="checkbox"  value="@{{d.id}}" lay-filter="is_hot" lay-skin="switch" lay-text="是|否">
    @{{# }}}
</script>

<script type="text/html" id="toolbarDemo">
    <button type="button" class="layui-btn layui-btn-normal layui-btn-xs" lay-event="show">查看</button>
</script>


<script type="text/html" id="listBar">
    <a class="layui-btn layui-btn-xs layui-btn-warm" data-url="{{url('admin/game/region-list')}}?game_id=@{{ d.id }}" lay-event="service">游戏区服</a>
    <a class="layui-btn layui-btn-xs"  data-url="{{url('admin/game/add-game')}}?id=@{{ d.id }}" lay-event="info">修改</a>
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

        form.on('switch(status)', function(data){
            var bool = data.elem.checked;
            var id = data.value;
            if (bool) {
                var status = 1;
            } else {
                var status = 0;
            }
            var index = layer.load(1);
            var url = "{{url('admin/game/add-game')}}";

            $.ajax({
                url:url,
                dateType:'json',
                data:{id:id,status:status},
                beforeSend:function() {

                },
                type:'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function (res) {
                    layer.close(index);
                    layer.msg("操作成功",{time:800,shade:0.3},function () {
                        table.reload('game_table')
                    });
                }
            })
        });


        form.on('switch(is_hot)', function(data){
            var bool = data.elem.checked;
            var id = data.value;
            if (bool) {
                var status = 1;
            } else {
                var status = 0;
            }
            var index = layer.load(1);
            var url = "{{url('admin/game/add-game')}}";

            $.ajax({
                url:url,
                dateType:'json',
                data:{id:id,is_hot:status},
                beforeSend:function() {

                },
                type:'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function (res) {
                    layer.close(index);
                    layer.msg("操作成功",{time:800,shade:0.3},function () {
                        table.reload('game_table')
                    });
                }
            })
        });


        table.on('toolbar(game_table)', function(obj){
            var that = this;
            if (obj.event == 'add') {
                var index = layer.open({
                    title: "添加游戏",
                    type: 2,
                    area: ['760px', '550px'],
                    scrollbar:true,
                    content: "{{url('admin/game/add-game')}}",
                    end:function () {
                        $(that).removeAttr("data-flag");
                        layui.cache.layerIndex = null;
                        table.reload('game_table')
                    }
                });
                // layer.full(index);
            }
        });

        table.on('tool(game_table)', function(obj){
            var data = obj.data;
            var that = this;
            if (obj.event == "show") {
                var jsondata = data;
                var arr = [];
                var obj = {
                    'alt':jsondata.name,
                    'pic':jsondata.id+"_id",
                    'src':jsondata.poster,
                    'thumb':jsondata.poster
                };
                arr.push(obj);
                var json = {
                    'title':jsondata.name,
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
                    title: data.name,
                    type: 2,
                    area: ['760px', '550px'],
                    content: url,
                    end: function() {
                        $(that).removeAttr("data-flag");
                        layui.cache.layerIndex = null;
                        table.reload('game_table')
                    }
                });
            }else if(obj.event == 'service'){

                var url = $(this).data('url');

                var index = layer.open({
                    type: 2,
                    title: data.name + "-游戏区服",
                    scrollbar:true,
                    content: url,
                    end:function () {
                        $(that).removeAttr("data-flag");
                        layui.cache.layerIndex = null;
                        table.reload('game_table')
                    }
                });
                layer.full(index);
            }

        });


    });




</script>
</body>

@include('admin._include.footer')


