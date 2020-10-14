@include('admin._include.header')
<body class="auth-user">
<div class="layui-fluid">
    <div class="layui-row larryms-panel auth-user-add">
        <form class="layui-form" method="post">
            <div class="layui-form-item">
                <label class="layui-form-label">分类名称</label>
                <div class="layui-input-block">
                    <input type="text" name="cate_name" lay-verify="required" placeholder="请填写分类名称"  value="{{$cate->cate_name}}" autocomplete="off" class="layui-input larry-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">分类图片</label>

                <div class="layui-card-body">
                    <div class="layui-upload">
                        <button type="button" class="layui-btn" id="test-upload-normal">上传图片</button>
                        <div class="layui-upload-list">
                            <img class="layui-upload-img" src="{{$cate->image}}" style="width: 100px;margin-left: 95px" id="test-upload-normal-img">
                            <p id="test-upload-demoText"></p>
                        </div>
                    </div>
                    <blockquote class="layui-elem-quote">
                        为提高网站性能，请尽可能上传小于 500kb 矢量图片
                    </blockquote>
                </div>

            </div>
            <div class="layui-form-item" style="text-align: center">
                <input type="hidden" name="image" lay-verify="required" value="{{$cate->image}}">
                <input type="hidden" name="id" value="{{$cate->id}}">
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
                    $("input[name='image']").val(res.data);
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


        form.on('submit(cate_add)', function(data) {
            console.log(data.field);
            var index = layer.load(1);
            $.ajax({
                url:"{{url('admin/game/add-cate')}}",
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