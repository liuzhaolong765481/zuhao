@include('admin._include.header')
<body class="auth-user">
<div class="layui-fluid">
    <div class="layui-row larryms-panel auth-user-add">
        <form class="layui-form" method="post">
            <div class="layui-form-item">
                <label class="layui-form-label">账号标题</label>
                <div class="layui-input-block">
                    <input type="text" name="title" lay-verify="required" placeholder="请填写账号标题"  value="{{$account->title}}" autocomplete="off" class="layui-input larry-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">游戏</label>
                <div class="layui-input-block">
                    <select name="game_id" lay-verify="required" lay-filter="game_select">
                        <option value="">请选择一个游戏</option>
                        @foreach ($game as $item)
                            <option value="{{$item->id}}" @if($account->game_id == $item->id) selected @endif>{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">游戏大区</label>
                <div class="layui-input-block">
                    <select name="region_id" id="region_select" lay-filter="region_select">
                        <option value="">请选择游戏大区</option>
                        @foreach($region as $item)
                            <option value="{{$item->id}}" @if($account->region_id == $item->id) selected @endif>{{$item->region_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="layui-form-item">
                <label class="layui-form-label">游戏服务器</label>
                <div class="layui-input-block">
                    <select name="service_id" id="service_select" lay-filter="service_select">
                        <option value="">请选择游戏服务器</option>
                        @foreach($service as $item)
                            <option value="{{$item->id}}" @if($account->service_id == $item->id) selected @endif>{{$item->service_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="layui-form-item">
                <label class="layui-form-label">租号说明</label>
                <div class="layui-input-block">
                    <textarea name="explain"  placeholder="请输入租号说明，100字以内" class="layui-textarea">{{$account->explain}}</textarea>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">账号描述</label>
                <div class="layui-input-block">
                    <textarea id="demo2" name="descript">{{$account->descript}}</textarea>
                </div>
            </div>


            <div class="layui-form-item">
                <label class="layui-form-label">账号图片</label>

                <div class="layui-card-body">
                    <div class="layui-upload">
                        <button type="button" class="layui-btn" id="test-upload-normal">上传图片</button>
                        <div class="layui-upload-list">
                            <p id="test-upload-demoText"></p>
                            @if(is_array($account->images))
                                @foreach($account->images as $item)
                                    <div class='image_div'><em class='layui-img-del'></em>
                                        <img class='layui-upload-img enlarge' src='{{$item}}'>
                                        <input type='hidden' name='images[]' value='{{$item}}'>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">出租规格</label>
                <div class="layui-input-block">
                    @foreach($specs as $k => $item)
                        <input type="checkbox"
                               @foreach($account->account_specs as $item2)
                               @if($item->id == $item2->specs_id)
                               checked
                               @endif
                               @endforeach
                               title="{{$item->specs_name}}">
                        <input type="number" name="specs[{{$item->id}}]" style="margin-top: 5px"
                               @foreach($account->account_specs as $item2)
                               @if($item->id == $item2->specs_id)
                               value="{{$item2->price}}"
                               @endif
                               @endforeach
                               class="layui-input" placeholder="请输入响应规格对应价格（单位：元）"><br/>
                    @endforeach
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">账号标签</label>
                @if(is_array($account->tags))
                    @foreach($account->tags as $item)
                        <div class="layui-input-block">
                            <button class="layui-btn layui-btn-primary layui-btn-sm" type="button">{{$item}}</button>
                            <input type="hidden" name="tags[]" value="{{$item}}">
                            <button class="layui-btn layui-btn-primary layui-btn-sm del_tag" type="button"><i class="layui-icon"></i></button>
                        </div>
                    @endforeach
                @endif
                <div class="layui-input-block">
                    <button type="button" id="add_tag" class="layui-btn layui-btn-sm"><i class="layui-icon"></i></button>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">账号单价</label>
                <div class="layui-input-block">
                    <input type="number" name="amount" lay-verify="required" placeholder="请填写账号单价（单位：元）"  value="{{$account->amount}}" autocomplete="off" class="layui-input larry-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">账号押金</label>
                <div class="layui-input-block">
                    <input type="number" name="deposit" lay-verify="required" placeholder="请填写账号押金 0 为无需押金（单位：元）"  value="{{$account->deposit}}" autocomplete="off" class="layui-input larry-input">
                </div>
            </div>



            <div class="layui-form-item" style="text-align: center">
                <input type="hidden" name="id" value="{{$account->id}}">
                <button class="layui-btn" lay-submit lay-filter="account_add">确定</button>
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
                obj.preview(function(index, file, result){
                });
            },
            done: function(res){
                //如果上传失败
                if(res.status != SUCCESS){
                    return layer.msg(res.message);
                }else{
                    $('.layui-upload-list').append("" +
                        " <div class='image_div' > <em class='layui-img-del'></em><img class='layui-upload-img enlarge' src='"+res.data+"' >" +
                        "<input type='hidden' name='images[]' value='"+res.data+"'>"+
                        "</div>"
                    );
                    erLarge();
                }
                //上传成功
            },
            error: function(){
                //演示失败状态，并实现重传
                var demoText = $('#test-upload-demoText');
                demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-mini demo-reload">重试</a>');
                demoText.find('.demo-reload').on('click', function(){
                    uploadInst.upload();
                });
            }
        });


        form.on('submit(account_add)', function(data) {
            // console.log(data.field);
            var index = layer.load(1);
            $.ajax({
                url:"{{url('admin/account/add-account')}}",
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


        form.on('select(game_select)' ,function(data){
            $.ajax({
                url: "{{url('public/get-game-spu')}}",
                data: {'game_id': data.value},
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                success: function (resultData) {
                    $("#region_select").empty();
                    if (resultData.status === SUCCESS) {
                        $('#region_select').attr('lay-verify','required');

                        $("#region_select").append(new Option("请选择游戏大区", ""));
                        $.each(resultData.data, function (index, item) {
                            $('#region_select').append(new Option(item.region_name, item.id));
                        });
                    } else {

                        $('#region_select').removeAttr('lay-verify','required');
                        $("#region_select").append(new Option("请选择游戏大区", ""));
                    }

                    form.render("select");
                }
            });
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