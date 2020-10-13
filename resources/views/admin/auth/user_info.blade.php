@include('admin._include.header')
<body class="auth-user">
<div class="layui-fluid">
    <div class="layui-row larryms-panel auth-user-add">
        <form action="" class="layui-form" method="post" id="userAddForm">
            <div class="layui-form-item">
                <label class="layui-form-label">昵称</label>
                <div class="layui-input-block">
                    <input type="text" name="nick_name" lay-verify="required" disabled value="{{$user->nick_name}}" autocomplete="off" class="layui-input larry-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">邮箱</label>
                <div class="layui-input-block">
                    <input type="text" name="email" value="{{$user->email}}" placeholder="暂未填写" disabled lay-verify="required" autocomplete="off" class="layui-input larry-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">注册时间</label>
                <div class="layui-input-block">
                    <input type="text" name="register_time"  value="{{$user->register_time}}" disabled autocomplete="off"  class="layui-input larry-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">账户总金额</label>
                <div class="layui-input-block">
                    <input type="text" name="balance"  value="{{$user->balance}}" disabled autocomplete="off"  class="layui-input larry-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">可提现金额</label>
                <div class="layui-input-block">
                    <input type="text" name="withable_balance"  value="{{$user->withable_balance}}" disabled autocomplete="off"  class="layui-input larry-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">押金</label>
                <div class="layui-input-block">
                    <input type="text" name="deposit"  value="{{$user->deposit}}" disabled autocomplete="off"  class="layui-input larry-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">支付宝</label>
                <div class="layui-input-block">
                    <input type="text" name="ali_number" value="{{$user->ali_number}}" placeholder="暂未填写" disabled lay-verify="required" autocomplete="off" class="layui-input larry-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">真实姓名</label>
                <div class="layui-input-block">
                    <input type="text" name="ali_number" value="{{$user->ali_number}}" placeholder="暂未填写" disabled lay-verify="required" autocomplete="off" class="layui-input larry-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">身份证号</label>
                <div class="layui-input-block">
                    <input type="text" name="idcard" value="{{$user->idcard}}" placeholder="暂未填写" disabled lay-verify="required" autocomplete="off" class="layui-input larry-input">
                </div>
            </div>
            <input type="hidden" name="id" value="{{$user->id}}">
{{--            <div class="larryms-layer-btn">--}}
{{--                <a class="layui-btn layui-btn layui-btn-sm left" lay-submit="" lay-filter="useradd" id="submitAdd">确定</a>--}}
{{--                <a class="layui-btn layui-btn layui-btn-sm  layui-btn-danger" id="closeAdd" data-id="{$find.id}" >一键登录</a>--}}
{{--            </div>--}}
        </form>
    </div>
</div>

<script>
    layui.config({
        base: "/plugin/layuiadmin/" //静态资源所在路径
    }).extend({
        index: 'lib/index' //主入口模块
    });
</script>

</body>
@include('admin._include.footer')