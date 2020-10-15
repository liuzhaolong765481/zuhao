@include('admin._include.header')
<body class="auth-user">
<div class="layui-fluid">
    <div class="layui-row larryms-panel auth-user-add">
        <form class="layui-form" method="post">
            <div class="layui-form-item">
                <label class="layui-form-label">游戏名称</label>
                <div class="layui-input-block">
                    <input type="text" name="name" lay-verify="required" placeholder="请填写游戏名称"  value="{{$game->name}}" autocomplete="off" class="layui-input larry-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">游戏分类</label>
                <div class="layui-input-block">
                    <select name="cate_id" lay-verify="required">
                        <option value="">请选择一个分类</option>
                        @foreach ($game_cate as $item)
                        <option value="{{$item->id}}" @if($game->cate_id == $item->id) selected @endif>{{$item->cate_name}}</option>
                        @endforeach
                    </select>
                    {{--<input type="text" name="name" lay-verify="required" placeholder="请填写游戏名称"  value="{{$game->name}}" autocomplete="off" class="layui-input larry-input">--}}
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">游戏标签</label>
                @if(is_array($game->tag))
                @foreach($game->tag as $item)
                    <div class="layui-input-block">
                        <button class="layui-btn layui-btn-primary layui-btn-sm" type="button">{{$item}}</button>
                        <input type="hidden" name="tag[]" value="{{$item}}">
                        <button class="layui-btn layui-btn-primary layui-btn-sm del_tag" type="button"><i class="layui-icon"></i></button>
                    </div>
                @endforeach
                @endif
                <div class="layui-input-block">
                    <button type="button" id="add_tag" class="layui-btn layui-btn-sm"><i class="layui-icon"></i></button>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">排序</label>
                <div class="layui-input-block">
                    <input type="text" name="sort" lay-verify="required" placeholder="请填写游戏排序"  value="{{$game->sort}}"  class="layui-input larry-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">游戏描述</label>
                <div class="layui-input-block">
                    <textarea name="description" lay-verify="required" placeholder="请输入游戏描述" class="layui-textarea">{{$game->description}}</textarea>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">封面图片</label>

                <div class="layui-card-body">
                    <div class="layui-upload">
                        <button type="button" class="layui-btn" id="test-upload-normal">上传图片</button>
                        <div class="layui-upload-list">
                            <img class="layui-upload-img" src="{{$game->poster}}" style="width: 100px;margin-left: 95px" id="test-upload-normal-img">
                            <p id="test-upload-demoText"></p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="layui-form-item" style="text-align: center">
                <input type="hidden" name="poster" lay-verify="required" value="{{$game->poster}}">
                <input type="hidden" name="id" value="{{$game->id}}">
                <button class="layui-btn" lay-submit lay-filter="game_add">确定</button>
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
            upload = layui.upload;
        form = layui.form;

        var uploadInst = upload.render({
            elem: '#test-upload-normal',
            url: '{{url('public/upload')}}',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            multiple: false,  //是否允许多图上传
            accept: 'images',  //指定允许上传时校验的文件类型，可选值有：images（图片）、file（所有文件）、video（视频）、audio（音频）
            acceptMime: 'image/*',
            field: 'file',  //上传文件参数名
            before: function(obj){
                //预读本地文件示例，不支持ie8
                obj.preview(function(index, file, result){
                    $('#test-upload-normal-img').attr('src', result); //图片链接（base64）
                });
            },
            done: function(res){
                //如果上传失败
                if(res.status != SUCCESS){
                    return layer.msg(res.message);
                }else{
                    $("input[name='poster']").val(res.data);
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


        form.on('submit(game_add)', function(data) {
            // console.log(data.field);
            var index = layer.load(1);
            $.ajax({
                url:"{{url('admin/game/add-game')}}",
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
                        "                    <input type=\"hidden\" name=\"tag[]\" value='"+$('.tag_input').val()+"'>\n" +
                        "                    <button class=\"layui-btn layui-btn-primary layui-btn-sm del_tag\"  type=\"button\"><i class=\"layui-icon\"></i></button>\n" +
                        "                </div>");
                    layer.close(_tag)
                }
            });
        });


        $(document).on("click",".del_tag",function(){
            $(this).parents('.layui-input-block').remove()
        })
    });


</script>

</body>
@include('admin._include.footer')