@include('admin._include.header')
<style>
    body{
        background: #fff
    }
    .layui-tab-content{
        text-align: center;
    }
    .layui-form-label{
        width: 150px;
    }
</style>
<body>
<div class="layui-tab layui-tab-card">
    <ul class="layui-tab-title">
        @foreach($farther as $k=> $item)
            <li @if($k==0) class="layui-this" @endif>{{$item['name']}}</li>
        @endforeach
    </ul>
    <div class="layui-tab-content">
        @foreach($farther as $k => $item)
            <div  class="layui-tab-item @if($k==0) layui-show @endif " style="min-height: 500px">
                <form class="layui-form" >
                @foreach($item['list'] as $item2)

                        <div class="layui-form-item">
                            <label class="layui-form-label" >{{$item2->name}}</label>
                            <div class="layui-input-inline">
                                @if($item2->key == 'seo_descript')
                                    <textarea class="layui-textarea" name="{{$item2->id}}" id="" cols="30" rows="10">{{$item2->value}}</textarea>
                                @else
                                <input type="text" name="{{$item2->id}}" placeholder="请填写设置内容"  value="{{$item2->value}}" class="layui-input">
                                 @endif
                            </div>
                            <div class="layui-form-mid layui-word-aux">{{$item2->unit}}</div>
                        </div>

                @endforeach
                    <button lay-submit lay-filter="submit_setting" class="layui-btn">保存</button>
                </form>
            </div>
        @endforeach

    </div>
</div>

</body>
<script>
    layui.config({
        base: "/plugin/layuiadmin/" //静态资源所在路径
    }).extend({
        index: 'lib/index' //主入口模块
    }).use(['index', 'console', 'form'], function () {
        var $ = layui.jquery,
        form = layui.form;

        form.on('submit(submit_setting)', function(data) {
            console.log(data.field);
            var index = layer.load(1);
            $.ajax({
                url:"{{url('admin/setting/index')}}",
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
@include('admin._include.footer')