<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>飞讯租号</title>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <link type="text/css" rel="stylesheet" href="{{asset('css/public.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('css/animate.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('plugin/layui/css/layui.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <!--加载iconfont-->
    <script src="{{asset('js/zuhao/font.js')}}"></script>
    <!--加载JS-->
    <script type="text/javascript" src="{{asset('js/jquery-1.12.4.min.js')}}"></script>
    <script type="text/javascript"  src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugin/layui/layui.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/base.js')}}"></script>
{{--    <script type="text/javascript" src="{{asset('js/zuhao/lodash_swiper.js')}}"></script>--}}
{{--    <script type="text/javascript" src="{{asset('js/zuhao/menuaim_swiper.js')}}"></script>--}}
</head>
<style>
    .layui-layer{
        border: none!important;
    }
    .layui-layer-page{
        border: none!important;
    }
</style>
<body>


<!--登录模板-->
<div class="login-box template" data-width="400px">
    <ul class="tab-head">
        <li class="on">登录</li>
        <li class="to-register">注册</li>
    </ul>
    <div class="content">
        <form id="login-form" class="comm-form">
            <div class="form-item">
                <label class="pos-before" style="opacity: 0.4" for="login-username"><i class="icon icon-account"></i></label>
                <a class="pos-after" style="font-size: 0;" onclick="$(this).next('input').val('');"><i class="icon icon-clear-input"></i></a>
                <input id="login-username" class="username" type="text" name="user_phone" placeholder="请输入手机号">
            </div>
            <div class="form-item">
                <label class="pos-before" style="opacity: 0.4" for="login-password"><i class="icon icon-password"></i></label>
                <input id="login-password" class="password" type="password" name="password" placeholder="请输入你的密码" autocomplete="off">
            </div>
            <input type="button"  id="login-sub"  value="登录">
            <div class="tools cf">
                <a data-triggerClass="to-login" class="forget-password fr">忘记密码?</a>
            </div>
        </form>
    </div>
</div>

<!--注册模板-->
<div class="register-box template" data-width="400px">
    <ul class="tab-head">
        <li class="to-login">登录</li>
        <li class="on">注册</li>
    </ul>
    <div class="content">
        <form id="register-form" class="comm-form">
            <div class="form-item">
                <div class="pos-before dropmenu">
                    <div class="drop-title">
                        <input type="text" placeholder="" value="+86" readonly="readonly">
                        <i class="edge"></i>
                    </div>
                    <dl class="drop-menu" style="display: none;">
                        <dd class="selected">+86</dd>
                    </dl>
                </div>
                <a class="pos-after" style="font-size: 0;" onclick="$(this).next('input').val('');"><i class="icon icon-clear-input"></i></a>
                <input id="register-mobile" class="mobile" type="text" name="user_phone" placeholder="请输入手机号码" autocomplete="off">
            </div>
            <div id="register-captcha" class="form-item dragImgCaptcha"></div>
            <div class="form-item w-eight-two cf">
                <input class="pull-left captcha" name="validate_code" type="text" placeholder="请输入手机验证码" autocomplete="off">
                <button data-name="registerCaptchaTimer" type="button" data-type="register" class="get-captcha pull-right" tabindex="-1">获取验证码</button>
            </div>
            <div class="form-item" style="margin-bottom: 60px;">
                <input id="register-password" class="password" name="password" type="password" placeholder="6-20位数字或字母密码" autocomplete="off">
                <a class="pos-after see-password"><i class="icon icon-see-pwd"></i></a>
            </div>
            <p class="user-agree">
                <label class="checkbox">
                    <input id="register-agree" name="agree" type="checkbox" checked>
                    <i></i>
                </label>
                <label for="register-agree">我已阅读并接受</label><a target="_blank" href="">《飞讯租号用户协议》</a>
            </p>
            <input type="button" id="register-sub" value="注册">
        </form>
    </div>
</div>

<!--忘记密码-->
<div class="findPassword-box template" data-width="400px">
    <ul class="tab-head">
        <li>忘记密码</li>
    </ul>
    <div class="content">
        <form id="findPassword-form" class="comm-form">
            <div class="form-item">
                <div class="pos-before dropmenu">
                    <div class="drop-title">
                        <input type="text" placeholder="" value="+86" readonly="readonly">
                        <i class="edge"></i>
                    </div>
                    <dl class="drop-menu" style="display: none;">
                        <dd class="selected">+86</dd>
                    </dl>
                </div>
                <a class="pos-after" onclick="$(this).next('input').val('');"><i class="icon icon-clear-input"></i></a>
                <input id="findPassword-mobile" class="mobile" type="text" name="user_phone" placeholder="请输入手机号码" autocomplete="off">
            </div>
            <div id="findPwd-captcha" class="form-item dragImgCaptcha"></div>
            <div class="form-item w-eight-two cf">
                <input class="pull-left captcha" name="validate_code" type="text" placeholder="请输入手机验证码" autocomplete="off">
                <button type="button" data-name="findPasswordCaptchaTimer" data-type="code" class="get-captcha pull-right" tabindex="-1">获取验证码</button>
            </div>
            <div class="form-item" style="margin-bottom: 60px;">
                <input id="findPassword-password" class="password" name="password" type="password"
                       placeholder="请输入你的新密码" autocomplete="off">
                <a class="pos-after see-password"><i class="icon icon-see-pwd"></i></a>
            </div>
            <input type="button" id="find-password-sub" value="确认修改">
        </form>
    </div>
</div>

<header class="comm-header space-between hasOpacity">
    <div class="ver-center">
        <a href="/" class="logo ver-center">
            <img src="{{asset('images/logo.png')}}" alt="飞讯租号logo">
            <h1>飞讯租号</h1>
        </a>
        <div class="game-categories">
            <div class="btn center-center-column">
                <svg class="symbolIcon" aria-hidden="true">
                    <use xlink:href="#icon-category-menu"></use>
                </svg>
                游戏分类
            </div>
            <div class="content">
                <div class="wrap w-response">
                    <div class="games client">
                        <div class="tit ver-center">
                            <svg class="symbolIcon" aria-hidden="true">
                                <use xlink:href="#icon-client"></use>
                            </svg>
                            端游
                        </div>
                        <ul class="game-list">
                            @foreach($nav_game['pc'] as $k => $item)
                            <li>
                                <a href="">
                                    <img src="{{$item->poster}}" alt="{{$item->name}}">
                                    <span>{{$item->name}}</span>
                                    @if($item->is_hot)
                                    <svg class="symbolIcon" aria-hidden="true">
                                        <use xlink:href="#icon-hot"></use>
                                    </svg>
                                    @endif
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="split-line"></div>
                    <div class="games mobile">
                        <div class="tit ver-center">
                            <svg class="symbolIcon" aria-hidden="true">
                                <use xlink:href="#icon-mobile"></use>
                            </svg>
                            手游
                        </div>
                        <ul class="game-list">

                            @foreach($nav_game['mobile'] as $k => $item)
                                <li>
                                    <a href="">
                                        <img src="{{$item->poster}}" alt="{{$item->name}}">
                                        <span>{{$item->name}}</span>
                                        @if($item->is_hot)
                                            <svg class="symbolIcon" aria-hidden="true">
                                                <use xlink:href="#icon-hot"></use>
                                            </svg>
                                        @endif
                                    </a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="ver-center nav">
        <a class="" href="{{url('')}}">首页</a>
        <a class="" href="{{url('hall')}}">租号大厅</a>
        <a class="" href="" target="_blank">游戏陪玩</a>
        <a class="" href="">游戏百科</a>
    </nav>
    <div class="ver-center">
        <form class="search" action="{{url('search')}}" method="get" target="_blank">
            <div class="keywords related-words dropmenu">
                <div class="drop-title">
                    <input type="text" name="keywords" placeholder="搜索" maxlength="38" required="required" autocomplete="off">
                    <svg class="symbolIcon" aria-hidden="true">
                        <use xlink:href="#icon-search"></use>
                    </svg>
                </div>
            </div>
        </form>
        <!--未登录-->
        @if(!auth()->check())
        <div class="un-login ver-center" >
            <svg class="symbolIcon" aria-hidden="true">
                <use xlink:href="#icon-user-unlogin"></use>
            </svg>
            <button class="to-login">登录</button>
            <div class="split-line"></div>
            <button class="to-register">注册</button>
        </div>
        @else
        <!--已登录-->
        <div class="login-ed ver-center" >
            <a class="msg" href="">
                <svg class="symbolIcon js-hoverAnimate" data-animate="rubberBand" aria-hidden="true">
                    <use xlink:href="#icon-message"></use>
                </svg>
                {{--<span class="amount">999</span>--}}
            </a>
            <div class="user ver-center">
                <a class="center-center" href="{{url('member')}}">
                    <img src="{{auth()->user()->avatar ?: asset('images/default_icon.png')}}" alt="用户头像">
                    <span>{{auth()->user()->nick_name}}</span>
                </a>
                <div class="sub-menu">
                    <div class="balance">
                        <div>余额：<span>￥{{format_amount(auth()->user()->balance)}}</span></div>
                        <div class="buttons">
                            <a href="">充值</a>
                            <button class="cash ghost">提现</button>
                        </div>
                    </div>
                    <ul class="menu">
                        <li><a href="{{url('member/order')}}">我的订单</a></li>
                        <li><a href="{{url('member/rentorder')}}">我的出租订单</a></li>
                    </ul>
                    <ul class="menu">
                        <li><a class="to-logout" href="{{'auth/logout'}}">退出登录</a></li>
                    </ul>
                </div>
            </div>
        </div>
        @endif
    </div>
</header>



<script>
    $(function () {
        var url = "{{Request::url()}}";
        $(".nav a").each(function (index, element) {
            if($(this).attr('href') === url){
                $(this).attr('class','on')
            }
        })
    });
    layui.use('layer', function () {

        $('.to-login').on('click', function () {
            layer.closeAll();
            mask($('.login-box'))
        });

        $('.to-register').on('click', function () {
            layer.closeAll();
            mask($('.register-box'))
        });

        $('.forget-password').on('click',function () {
            layer.closeAll();
            mask($('.findPassword-box'));
        })

    });

    $('#register-sub').on('click', function () {

        if(!$("#register-agree").is(':checked')){
            layer.msg('请勾选用户协议');
            return false;
        }
        var user_phone = $(this).parents('form').find("input[name='user_phone']").val();
        var validate_code = $(this).parents('form').find("input[name='validate_code']").val();
        var password = $(this).parents('form').find("input[name='password']").val();
        if(!isPhone(user_phone)){
            layer.msg('请输入正确手机号码');
            return false;
        }
        if(!validate_code){
            layer.msg('请输入短信验证码');
            return false;
        }
        if(!password){
            layer.msg('请输入密码');
            return false;
        }

        ajaxRequest("{{url('auth/register')}}", showSuccess, $("#register-form").serializeArray())
    });


    $('#find-password-sub').on('click', function () {

        var user_phone = $(this).parents('form').find("input[name='user_phone']").val();
        var validate_code = $(this).parents('form').find("input[name='validate_code']").val();
        var password = $(this).parents('form').find("input[name='password']").val();
        if(!isPhone(user_phone)){
            layer.msg('请输入正确手机号码');
            return false;
        }
        if(!validate_code){
            layer.msg('请输入短信验证码');
            return false;
        }
        if(!password){
            layer.msg('请输入密码');
            return false;
        }

        ajaxRequest("{{url('auth/reset-psd')}}", showSuccess, $("#findPassword-form").serializeArray())

    });

    $('#login-sub').on('click', function () {
        var user_phone = $(this).parents('form').find("input[name='user_phone']").val();
        var password = $(this).parents('form').find("input[name='password']").val();
        if(!isPhone(user_phone)){
            layer.msg('请输入正确手机号码');
            return false;
        }
        if(!password){
            layer.msg('请输入密码');
            return false;
        }
        ajaxRequest("{{url('auth/login-psd')}}", reload, $("#login-form").serializeArray())
    });


    $('.get-captcha').on('click', function () {
        var user_phone = $(this).parents('form').find("input[name='user_phone']").val();
        var that = this;

        if(!isPhone(user_phone)){
            layer.msg('请输入正确手机号码');
            return false;
        }

        $.ajax({
            type:"post",
            url:"{{url('public/send-sms')}}",
            data:{
                user_phone:user_phone,
                type:$(that).data('type')
            },
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function (res) {
                if(res.status === SUCCESS){
                    setTime($(that))
                }
                layer.msg(res.message)
            },
        })


    })
</script>


