@include('admin/_include/header')
<div class="layadmin-user-login layadmin-user-display-show" id="LAY-user-login" style="display: none;">

    <div class="layadmin-user-login-main">
        <div class="layadmin-user-login-box layadmin-user-login-header">
            <h2>飞讯租号</h2>
            <p>飞讯租号后台管理系统</p>
        </div>
        <div class="layadmin-user-login-box layadmin-user-login-body layui-form">
            <div class="layui-form-item">
                <label class="layadmin-user-login-icon layui-icon layui-icon-username" for="LAY-user-login-username"></label>
                <input type="text" name="name" id="LAY-user-login-username" lay-verify="required" placeholder="用户名" class="layui-input">
            </div>
            <div class="layui-form-item">
                <label class="layadmin-user-login-icon layui-icon layui-icon-password" for="LAY-user-login-password"></label>
                <input type="password" name="password" id="LAY-user-login-password" lay-verify="required" placeholder="密码" class="layui-input">
            </div>
            <div class="layui-form-item">
                <div class="layui-row">
                    <div class="layui-col-xs7">
                        <label class="layadmin-user-login-icon layui-icon layui-icon-vercode" for="LAY-user-login-vercode"></label>
                        <input type="text" name="captcha" id="LAY-user-login-vercode" lay-verify="required" placeholder="图形验证码" class="layui-input">
                    </div>
                    <div class="layui-col-xs5">
                        <div style="margin-left: 10px;">
                            <img src="{{captcha_src()}}" class="layadmin-user-login-codeimg verify-code" onclick="refreshCode()" >
                        </div>
                    </div>
                </div>
            </div>
            <div class="layui-form-item">
                <button class="layui-btn layui-btn-fluid" lay-submit lay-filter="login-submit">登 入</button>
            </div>
{{--            <div class="layui-trans layui-form-item layadmin-user-login-other">--}}
{{--                <label>社交账号登入</label>--}}
{{--                <a href="javascript:;"><i class="layui-icon layui-icon-login-qq"></i></a>--}}
{{--                <a href="javascript:;"><i class="layui-icon layui-icon-login-wechat"></i></a>--}}
{{--                <a href="javascript:;"><i class="layui-icon layui-icon-login-weibo"></i></a>--}}
{{--                <a href="reg.html" class="layadmin-user-jump-change layadmin-link">注册帐号</a>--}}
{{--            </div>--}}
        </div>
    </div>

{{--    <div class="layui-trans layadmin-user-login-footer">--}}

{{--        <p>© 2018 <a href="http://www.layui.com/" target="_blank">layui.com</a></p>--}}
{{--        <p>--}}
{{--            <span><a href="http://www.layui.com/admin/#get" target="_blank">获取授权</a></span>--}}
{{--            <span><a href="http://www.layui.com/admin/pro/" target="_blank">在线演示</a></span>--}}
{{--            <span><a href="http://www.layui.com/admin/" target="_blank">前往官网</a></span>--}}
{{--        </p>--}}
{{--    </div>--}}

{{--    <div class="ladmin-user-login-theme">--}}
{{--      <script type="text/html" template>--}}
{{--        <ul>--}}
{{--          <li data-theme=""><img src="{{asset('plugin/layuiadmin/style/res/bg-none.jpg')}}"></li>--}}
{{--          <li data-theme="#03152A" style="background-color: #03152A;"></li>--}}
{{--          <li data-theme="#2E241B" style="background-color: #2E241B;"></li>--}}
{{--          <li data-theme="#50314F" style="background-color: #50314F;"></li>--}}
{{--          <li data-theme="#344058" style="background-color: #344058;"></li>--}}
{{--          <li data-theme="#20222A" style="background-color: #20222A;"></li>--}}
{{--        </ul>--}}
{{--      </script>--}}
{{--    </div>--}}


</div>
<script>
    layui.use(['form'], function () {
        var form = layui.form;
        form.render();
        form.on('submit(login-submit)', function (obj) {
            $.ajax({
                url: "{{url('admin/auth/login')}}",
                type: "post",
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function(){
                    ajaxLoad = loading();
                },
                data:obj.field,
                success:function (e) {
                    layer.closeAll();
                    if(e.status == SUCCESS){
                        reload()
                    }else{
                        refreshCode();
                        layer.msg(e.message)
                    }

                }
            });
        });
    });



</script>
@include('admin/_include/footer')