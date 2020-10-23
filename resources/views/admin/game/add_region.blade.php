@include('admin._include.header')
<body class="auth-user">
<div class="layui-fluid">
    <div class="layui-row larryms-panel auth-user-add">
        <form class="layui-form" method="post">
            <div class="layui-form-item">
                <label class="layui-form-label">大区名称</label>
                <div class="layui-input-block">
                    <input type="text" name="region_name" lay-verify="required" placeholder="请填写大区名称"  value="{{$region->region_name}}" autocomplete="off" class="layui-input larry-input">
                    <input type="hidden" name="game_id" value="{{$game_id}}">
                </div>
            </div>
            <div class="layui-form-item" style="text-align: center">
                <input type="hidden" name="id" value="{{$region->id}}">
                <button class="layui-btn" lay-submit lay-filter="cate_add">确定</button>
            </div>

        </form>
    </div>
</div>

<script>
    layui.config({
        base: "/plugin/layuiadmin/" //静态资源所在路径
    }).extend({
        index: 'lib/index' //主入口模块
    }).use(['index', 'upload','form'], function(){
        var $ = layui.jquery,
        form = layui.form;

        form.on('submit(cate_add)', function(data) {
            console.log(data.field);
            var index = layer.load(1);
            $.ajax({
                url:"{{url('admin/game/add-region')}}",
                dateType:'json',
                data:data.field,
                type:'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function (res) {
                    layer.close(index);
                    layer.msg("操作成功");
                }
            });

            return false;
        });


    });
</script>

</body>
@include('admin._include.footer')