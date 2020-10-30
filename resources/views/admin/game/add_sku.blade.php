@include('admin._include.header')
<body class="auth-user">
<div class="layui-fluid">
    <div class="layui-row larryms-panel auth-user-add">
        <form class="layui-form" method="post">

            <div class="layui-form-item">
                <label class="layui-form-label">游戏</label>
                <div class="layui-input-block">
                    <select name="game_id" lay-verify="required">
                        <option value="">请选择一个游戏</option>
                        @foreach ($game as $item)
                            <option value="{{$item->id}}" @if($sku->game_id == $item->id) selected @endif>{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="layui-form-item">
                <label class="layui-form-label">sku名称</label>
                <div class="layui-input-block">
                    <input type="text" name="sku_name" lay-verify="required" placeholder="请填写sku名称"  value="{{$sku->sku_name}}"  class="layui-input larry-input">
                </div>
            </div>


            <div class="layui-form-item">
                <label class="layui-form-label">sku图标</label>

                <div class="layui-card-body">
                    <div class="layui-upload">
                        <button type="button" class="layui-btn test-upload-normal" >上传图片</button>
                        <input type="hidden" name="sku_icon" value="{{$sku->sku_icon}}">
                        <div class="layui-upload-list">
                            <img class="layui-upload-img" src="{{$sku->sku_icon}}" style="width: 100px;margin-left: 95px" id="test-upload-normal-img">
                            <p id="test-upload-demoText"></p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="layui-form-item" style="text-align: center">

                <input type="hidden" name="id" value="{{$sku->id}}">
                <button class="layui-btn" lay-submit lay-filter="sku_add">确定</button>
            </div>

        </form>
    </div>
</div>


<script>
    layui.config({
        base: "/plugin/layuiadmin/" //静态资源所在路径
    }).extend({
        index: 'lib/index' //主入口模块
    }).use(['index', 'upload', 'form'], function(){
        var $ = layui.jquery,
            upload = layui.upload;
        form = layui.form;

        var uploadInst = upload.render({
            elem: '.test-upload-normal',
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
                // obj.preview(function(index, file, result){
                //     $('#test-upload-normal-img').attr('src', result); //图片链接（base64）
                // });
            },
            done: function(res){
                //如果上传失败
                if(res.status != SUCCESS){
                    return layer.msg(res.message);
                }else{
                    $(this.item).next().next().val(res.data);
                    $(this.item).next().next().next().find('img').attr('src', res.data)
                }
                //上传成功
            },

        });


        form.on('submit(sku_add)', function(data) {
            // console.log(data.field);
            var index = layer.load(1);
            $.ajax({
                url:"{{url('admin/game/add-sku')}}",
                dateType:'json',
                data:data.field,
                type:'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function (res) {
                    layer.close(index);
                    layer.msg("操作成功",function () {
                        layer.closeAll()
                    });
                }
            });

            return false;
        });

    });


</script>

</body>
@include('admin._include.footer')