@include('admin._include.header')
<body style="background: #fff">
<style>
    .layui-form-label{
        width: 150px;
    }
    .layui-input {
        width: 400px;
    }
    .layui-tab{
        width: 625px;
        margin-left: 10px;
    }
</style>
<div class="layui-tab layui-tab-card">
    <ul class="layui-tab-title">
        @foreach($farther as $k=> $item)
            <li @if($k==0) class="layui-this" @endif>{{$item['name']}}</li>
        @endforeach
    </ul>
    <div class="layui-tab-content">
        @foreach($farther as $k => $item)
            <div  class="layui-tab-item @if($k==0) layui-show @endif " style="min-height: 500px">
                <form class="layui-form" method="post">
                @foreach($item['list'] as $item2)

                        <div class="layui-form-item">
                            <label class="layui-form-label" >{{$item2->name}}</label>
                            <div class="layui-input-block">
                                <input type="text" style="width: 400px" name="{{$item2->id}}" placeholder="请填写设置内容"  value="{{$item2->value}}" class="layui-input larry-input">
                            </div>
                        </div>

                @endforeach
                </form>
            </div>
        @endforeach
        <button class="layui-btn layui-btn-fluid">保存</button>
    </div>

</div>

</body>
<script>
    layui.config({
        base: "/plugin/layuiadmin/" //静态资源所在路径
    }).extend({
        index: 'lib/index' //主入口模块
    }).use(['index', 'console']);
</script>
@include('admin._include.footer')