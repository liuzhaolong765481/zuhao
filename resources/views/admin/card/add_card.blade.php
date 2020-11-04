@include('admin._include.header')

<body class="auth-user">
<div class="layui-fluid">
    <div class="layui-row larryms-panel auth-user-add">
        <form class="layui-form" method="post">
            <div class="layui-form-item">
                <label class="layui-form-label">卡券名称</label>
                <div class="layui-input-block">
                    <input type="text" name="card_name" lay-verify="required" placeholder="请填写卡券名称"  value="{{$card->card_name}}" autocomplete="off" class="layui-input larry-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">卡券类型</label>
                <div class="layui-input-block">
                    <select name="type" lay-verify="required" lay-filter="type_select">
                        <option value="">请选择卡券类型</option>
                        @foreach($card->typeArray() as $k => $item)
                            <option @if($card->type == $k) selected @endif value="{{$k}}">{{$item}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">卡券领取渠道</label>
                <div class="layui-input-block">
                    <select name="channel" lay-verify="required">
                        <option value="">卡券领取渠道</option>
                        @foreach($card->channelArray() as $k => $item)
                            <option @if($card->channel == $k) selected @endif value="{{$k}}">{{$item}}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="layui-form-item">
                <label class="layui-form-label" id="changItem">卡券抵扣金额</label>
                <div class="layui-input-block">
                    <input type="text" name="amount" lay-verify="required" placeholder="如金额卡券此项为必填项"  value="{{$card->amount}}" autocomplete="off" class="layui-input larry-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">领取后失效时间/小时</label>
                <div class="layui-input-block">
                    <input type="number" name="expire_time" lay-verify="required" placeholder="为0则用不失效（小时）"  value="{{$card->expire_time}}" autocomplete="off" class="layui-input larry-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">卡券数量</label>
                <div class="layui-input-block">
                    <input type="number" name="number" lay-verify="required" placeholder="卡券数量为0则为不限制数量"  value="{{$card->number}}" autocomplete="off" class="layui-input larry-input">
                </div>
            </div>


            <div class="layui-form-item">
                <label class="layui-form-label">卡片icon</label>

                <div class="layui-card-body">
                    <div class="layui-upload">
                        <button type="button" class="layui-btn" id="test-upload-normal">上传图片</button>
                        <div class="layui-upload-list" style="display: @if($card->card_image) block @else none @endif">
                            <img class="layui-upload-img enlarge" src="{{$card->card_image}}" style="width: 100px;margin-left: 95px" id="test-upload-normal-img">
                            <p id="test-upload-demoText"></p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="layui-form-item" style="text-align: center">
                <input type="hidden" name="id" value="{{$card->id}}">
                <input type="hidden" name="card_image" value="{{$card->card_image}}">
                <button class="layui-btn" lay-submit lay-filter="card_add">确定</button>
            </div>

        </form>
    </div>
</div>


<script>
    layui.config({
        base: "/plugin/layuiadmin/" //静态资源所在路径
    }).extend({
        index: 'lib/index' //主入口模块
    }).use(['index', 'upload', 'form', 'layedit'], function(){
        var $ = layui.jquery,
            upload = layui.upload;
        form = layui.form;
        layedit = layui.layedit;

        layedit.build('demo2',{
            'height':'300',

        }); //建立编辑器

        var uploadInst = upload.render({
            elem: '#test-upload-normal',
            url: '{{url('public/upload')}}',
            multiple: true,  //是否允许多图上传
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            accept: 'images',  //指定允许上传时校验的文件类型，可选值有：images（图片）、file（所有文件）、video（视频）、audio（音频）
            acceptMime: 'image/*',
            field: 'file',  //上传文件参数名
            before: function(obj){
                //预读本地文件示例，不支持ie8
                // obj.preview(function(index, file, result){
                // });
            },
            done: function(res){
                //如果上传失败
                if(res.status != SUCCESS){
                    return layer.msg(res.message);
                }else{
                    $('#test-upload-normal-img').attr('src', res.data);
                    $('.layui-upload-list').css('display','block');
                    $("input[name='card_image']").val(res.data);
                    erLarge();
                }
                //上传成功
            },
            error: function(){
                //演示失败状态，并实现重传
                var demoText = $('#test-upload-demoText');
                demoText.html('<span style="color:#FF5722;">上传失败</span> <a class="layui-btn layui-btn-mini demo-reload">重试</a>');
                demoText.find('.demo-reload').on('click', function(){
                    uploadInst.upload();
                });
            }
        });


        form.on('submit(card_add)', function(data) {
            // console.log(data.field);
            var index = layer.load(1);
            $.ajax({
                url:"{{url('admin/card/add-card')}}",
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


        form.on('select(type_select)' ,function(data){
            if(data.value == 1){

                $('#changItem').text('卡券抵扣金额');
                $('#changItem').next().find('input').attr('name','amount');
                $('#changItem').next().find('input').attr('placeholder','如金额卡券此项为必填项');
            }else if(data.value == 2){

                $('#changItem').text('卡券抵扣小时');
                $('#changItem').next().find('input').attr('name','hour');
                $('#changItem').next().find('input').attr('placeholder','如小时卡此项为必填项');
            }
        });


        form.on('select(region_select)' ,function(data){
            $.ajax({
                url: "{{url('public/get-game-spu')}}",
                data: {'region_id': data.value},
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                success: function (resultData) {
                    $("#service_select").empty();
                    if (resultData.status === SUCCESS) {
                        $('#service_select').attr('lay-verify','required');

                        $("#service_select").append(new Option("请选择游戏服务器", ""));
                        $.each(resultData.data, function (index, item) {
                            $('#service_select').append(new Option(item.service_name, item.id));
                        });
                    } else {
                        $('#service_select').removeAttr('lay-verify','required');
                        $("#service_select").append(new Option("请选择游戏服务器", ""));
                    }

                    form.render("select");
                }
            });
        });


        $("#add_tag").on('click',function () {
            var that = $(this);
            var _tag = layer.open({
                title: '添加标签',
                type: 1,
                area: ['200px', '200px'],
                content:"<input type='text' class='layui-input tag_input'  style='padding: 0 10px' placeholder='请填写标签内容'/>",
                shadeClose: true,
                closeBtn : 2,
                btn: ["确认","取消"],
                btnAlign: 'c',
                yes: function () {
                    that.parent().before(" <div class=\"layui-input-block\">\n" +
                        "                    <button class=\"layui-btn layui-btn-primary layui-btn-sm\" type=\"button\">"+$('.tag_input').val()+"</button>\n" +
                        "                    <input type=\"hidden\" name=\"tags[]\" value='"+$('.tag_input').val()+"'>\n" +
                        "                    <button class=\"layui-btn layui-btn-primary layui-btn-sm del_tag\"  type=\"button\"><i class=\"layui-icon\"></i></button>\n" +
                        "                </div>");
                    layer.close(_tag)
                }
            });
        });


        $(document).on("click",".del_tag",function(){
            $(this).parents('.layui-input-block').remove()
        });

        $(document).on("click",".layui-img-del",function(){
            $(this).parents('.image_div').remove()
        });

    });


</script>

</body>
@include('admin._include.footer')