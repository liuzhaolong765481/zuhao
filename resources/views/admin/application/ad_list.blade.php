@include('admin._include.header')

<body>

<div class="layui-fluid">
    <div class="larry-container">
        <div class="layui-row layui-col-space15 larryms-data-top">
            <div class="layui-col-xs12 layui-col-sm12 layui-col-md12 layui-col-lg12">
                <script type="text/html" id="tools">
                    <button type="button" class="layui-btn" lay-event="add">添加广告</button>
                </script>
                <table lay-filter="ad_table" class="layui-table" lay-data="{height:'full-155',cellMinWidth:95,url:'{{url('admin/application/ad-list')}}', page:true, id:'ad_table',toolbar:'#tools',defaultToolbar:[]}">
                    <thead>
                    <tr>
                        <th lay-data="{field:'id', align:'center'}">ID</th>
                        <th lay-data="{field:'type_name',align:'center'}">广告分类</th>
                        <th lay-data="{toolbar:'#toolbarDemo',width:200,align:'center'}">图片</th>
                        <th lay-data="{field:'create_time',align:'center'}">创建时间</th>
                        <th lay-data="{align:'center',templet:'#is_show'}">是否启用</th>
                        <th lay-data="{title:'操作',templet:'#listBar',align:'center'}">操作</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/html" id="toolbarDemo">
    <img src="@{{ d.image }}" alt="" lay-filter="show">
</script>

<script type="text/html" id="is_show">
    @{{# if (d.is_show == 1) { }}
    <input type="checkbox" checked="true" lay-filter="is_show" value="@{{d.id}}" lay-skin="switch" lay-text="是|否">
    @{{# } else {}}
    <input type="checkbox"  value="@{{d.id}}" lay-filter="is_show" lay-skin="switch" lay-text="是|否">
    @{{# }}}
</script>

<script type="text/html" id="listBar">
    <a class="layui-btn layui-btn-xs"  data-url="{{url('admin/application/add-ad')}}?id=@{{ d.id }}" lay-event="info">修改</a>
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

        form.on('switch(is_show)', function(data){
            var bool = data.elem.checked;
            var id = data.value;
            if (bool) {
                var status = 1;
            } else {
                var status = 0;
            }
            var index = layer.load(1);
            var url = "{{url('admin/application/add-ad')}}";

            $.ajax({
                url:url,
                dateType:'json',
                data:{id:id,"is_show":status},
                beforeSend:function() {

                },
                type:'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function (res) {
                    layer.close(index);
                    layer.msg("操作成功",{time:800,shade:0.3},function () {
                        table.reload('ad_table')
                    });
                }
            })
        });

        table.on('toolbar(ad_table)', function(obj){
            var that = this;
            if (obj.event == 'add') {
                var index = layer.open({
                    title: "添加广告",
                    type: 2,
                    area: ['760px', '550px'],
                    scrollbar:true,
                    content: "{{url('admin/application/add-ad')}}",
                    end:function () {
                        $(that).removeAttr("data-flag");
                        layui.cache.layerIndex = null;
                        table.reload('ad_table')
                    }
                });
                // layer.full(index);
            }
        });

        table.on('tool(ad_table)', function(obj){
            var data = obj.data;
            var that = this;
            if (obj.event == "show") {
                console.log(data);return false;
                // var arr = [];
                // var obj = {
                //     'alt':jsondata.cate_name,
                //     'pic':jsondata.id+"_id",
                //     'src':jsondata.image,
                //     'thumb':jsondata.image
                // };
                // arr.push(obj);
                // var json = {
                //     'title':jsondata.cate_name,
                //     'id':jsondata.id,
                //     'start':0,
                //     'data':arr
                // };
                layer.photos({
                    photos: json,
                    anim:2
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
                        table.reload('ad_table')
                    }
                });
            }

        });


    });




</script>
</body>

@include('admin._include.footer')


