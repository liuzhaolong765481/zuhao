@include('admin._include.header')
<body class="auth-user">
<div class="layui-fluid">
    <div class="layui-row larryms-panel auth-user-add">
        <form class="layui-form" method="post">

            <div class="layui-form-item">
                <label class="layui-form-label">游戏服务器</label>
{{--                @if(is_array($service))--}}
                    @foreach($service as $item)
                        <div class="layui-input-block">
                            <button class="layui-btn layui-btn-primary layui-btn-sm" type="button">{{$item->service_name}}</button>
                            <button class="layui-btn layui-btn-primary layui-btn-sm del_service" data-id="{{$item->id}}" type="button">
                                <i class="layui-icon"></i>
                            </button>
                        </div>
                    @endforeach
                {{--@endif--}}
                <div class="layui-input-block">
                    <button type="button" id="add_service" class="layui-btn layui-btn-sm"><i class="layui-icon"></i></button>
                </div>
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
    });


    $("#add_service").on('click',function () {
        var that = $(this);
        var _tag = layer.open({
            title: '添加服务器',
            type: 1,
            area: ['200px', '200px'],
            content:"<input type='text' class='layui-input service_input'  style='padding: 0 10px' placeholder='请填写服务器名称'/>",
            shadeClose: true,
            closeBtn : 2,
            btn: ["确认","取消"],
            btnAlign: 'c',
            yes: function () {
                $.ajax({
                    url: "{{url('admin/game/add-service')}}",
                    data: {
                        'region_id': "{{$region_id}}",
                        'service_name': $('.service_input').val()
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: "json",
                    type: 'post',
                    success: function (e) {
                        if (e.status == SUCCESS) {
                            that.parent().before(" <div class=\"layui-input-block\">\n" +
                                "                    <button class=\"layui-btn layui-btn-primary layui-btn-sm\" type=\"button\">" + $('.service_input').val() + "</button>\n" +
                                "                    <button class=\"layui-btn layui-btn-primary layui-btn-sm del_service\"  type=\"button\"><i class=\"layui-icon\"></i></button>\n" +
                                "                </div>");
                            layer.close(_tag)
                        } else {
                            layer.msg(e.message);
                        }
                    }
                });

            }
        });
    });


    $(document).on("click",".del_service",function(){
        var that = $(this);
        $.ajax({
            url: "{{url('admin/game/add-service')}}",
            data: {
                'id':that.data('id'),
                'region_id': "{{$region_id}}",
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: "json",
            type: 'post',
            success: function (e) {
                if (e.status == SUCCESS) {
                    that.parents('.layui-input-block').remove()
                } else {
                    layer.msg(e.message);
                }
            }
        });


    })

</script>

</body>
@include('admin._include.footer')