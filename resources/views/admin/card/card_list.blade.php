@include('admin._include.header')

<body>

<div class="layui-fluid">
    <div class="larry-container">
        <div class="layui-row layui-col-space15 larryms-data-top">
            <div class="layui-col-xs12 layui-col-sm12 layui-col-md12 layui-col-lg12">
                <script type="text/html" id="tools">
                    <button type="button" class="layui-btn" lay-event="add">添加卡券</button>
                </script>
                <table lay-filter="card_table" class="layui-table" lay-data="{height:'full-155',cellMinWidth:95,url:'{{url('admin/card/card-list')}}', page:true, id:'card_table',toolbar:'#tools',defaultToolbar:[]}">
                    <thead>
                    <tr>
                        <th lay-data="{field:'id', align:'center'}">ID</th>
                        <th lay-data="{field:'card_name',align:'center'}">卡券名称</th>
                        <th lay-data="{field:'type_string',align:'center'}">卡券类型</th>
                        <th lay-data="{field:'number',align:'center'}">卡券数量</th>
                        <th lay-data="{field:'use_number',align:'center'}">已领取数量</th>
                        <th lay-data="{field:'hour',align:'center'}">抵扣小时</th>
                        <th lay-data="{field:'amount',align:'center'}">抵扣金额</th>
                        <th lay-data="{field:'expire_time',align:'center'}">领取后失效时间/小时</th>
                        <th lay-data="{align:'center',templet:'#status'}">是否生效</th>
                        <th lay-data="{title:'操作',templet:'#listBar',align:'center'}">操作</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/html" id="status">
    @{{# if (d.status == 1) { }}
    <input type="checkbox" checked="true" lay-filter="status" value="@{{d.id}}" lay-skin="switch" lay-text="是|否">
    @{{# } else {}}
    <input type="checkbox"  value="@{{d.id}}" lay-filter="status" lay-skin="switch" lay-text="是|否">
    @{{# }}}
</script>

<script type="text/html" id="toolbarDemo">
    <button type="button" class="layui-btn layui-btn-normal layui-btn-xs" lay-event="show">查看</button>
</script>

<script type="text/html" id="listBar">
    <a class="layui-btn layui-btn-xs"  data-url="{{url('admin/card/add-card')}}?id=@{{ d.id }}" lay-event="info">修改</a>
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
            var url = "{{url('admin/card/add-card')}}";

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
                        table.reload('card_table')
                    });
                }
            })
        });


        table.on('toolbar(card_table)', function(obj){
            var that = this;
            if (obj.event == 'add') {
                var index = layer.open({
                    title: "添加卡券",
                    type: 2,
                    area: ['760px', '800px'],
                    scrollbar:true,
                    content: "{{url('admin/card/add-card')}}",
                    end:function () {
                        $(that).removeAttr("data-flag");
                        layui.cache.layerIndex = null;
                        table.reload('card_table')
                    }
                });
                // layer.full(index);
            }
        });


    });




</script>
</body>

@include('admin._include.footer')


