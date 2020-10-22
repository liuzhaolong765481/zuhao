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
                        <th lay-data="{toolbar:'#spu',width:200,align:'center'}">游戏区服</th>
                        <th lay-data="{field:'title',align:'center'}">发布标题</th>
                        <th lay-data="{toolbar:'#toolbarDemo',width:200,align:'center'}">游戏图片</th>
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
    @{{# if (d.is_upper == 1) { }}
    <input type="checkbox" checked="true" lay-filter="status" value="@{{d.id}}" lay-skin="switch" lay-text="是|否">
    @{{# } else {}}
    <input type="checkbox"  value="@{{d.id}}" lay-filter="status" lay-skin="switch" lay-text="是|否">
    @{{# }}}
</script>

<script type="text/html" id="toolbarDemo">
    <button type="button" class="layui-btn layui-btn-normal layui-btn-xs" lay-event="show">查看</button>
</script>

<script type="text/html" id="spu">
    <button type="button" class="layui-btn layui-btn-warm layui-btn-xs">@{{ d.region ? d.region : '暂无'}}</button>
    <button type="button" class="layui-btn layui-btn-xs">@{{ d.service ? d.service : '暂无'}}</button>
</script>

<script type="text/html" id="listBar">
    <a class="layui-btn layui-btn-xs"  data-url="{{url('admin/account/add-account')}}?id=@{{ d.id }}" lay-event="info">修改</a>
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
            var url = "{{url('admin/account/add-account')}}";

            $.ajax({
                url:url,
                dateType:'json',
                data:{id:id,is_upper:status},
                beforeSend:function() {

                },
                type:'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function (res) {
                    layer.close(index);
                    layer.msg("操作成功",{time:800,shade:0.3},function () {
                        table.reload('user_table')
                    });
                }
            })
        });


        table.on('toolbar(account_table)', function(obj){
            var that = this;
            if (obj.event == 'add') {
                var index = layer.open({
                    title: "添加账号",
                    type: 2,
                    area: ['760px', '800px'],
                    scrollbar:true,
                    content: "{{url('admin/account/add-account')}}",
                    end:function () {
                        $(that).removeAttr("data-flag");
                        layui.cache.layerIndex = null;
                        table.reload('account_table')
                    }
                });
                // layer.full(index);
            }
        });

        table.on('tool(account_table)', function(obj){
            var data = obj.data;
            var that = this;
            if (obj.event == "show") {
                var arr = [];
                $.each(data.images, function (k,v) {
                    var obj = {
                        'alt':data.title,
                        'pic':data.id+"_id",
                        'src':v,
                        'thumb':v
                    };
                    arr.push(obj);
                });
                var json = {
                    'title':data.title,
                    'id':data.id,
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
                // layer.full(index);
            }

        });


    });




</script>
</body>

@include('admin._include.footer')


