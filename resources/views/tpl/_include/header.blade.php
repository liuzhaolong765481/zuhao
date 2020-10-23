<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>飞讯租号</title>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <link type="text/css" rel="stylesheet" href="{{asset('css/zuhao/activitiesregister.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('css/zuhao/animate.min.css')}}"/>
    <script>
        //低于IE10前往浏览器升级
        if (/msie/i.test(navigator.userAgent) && navigator.userAgent.match(/msie (\d+\.\d+)/i)[1] < 10)
            location.replace('/ieupdate.html');

        //Zuhao定义
        window.ZuhaoClient = window.ZuhaoClient || null;
        window.Zuhao = {
            config: {
                webAddr: 'https://www.zuhao.com/',
                apiAddr: 'https://api.zuhao.com/',
                agreement: '2ev63a4s9442',
                cashFeeRatio: {"1": 5, "2": 2}
            },
            isMobile: document.documentElement.offsetWidth < 768,
            getBrowserName: function () {
                var userAgent = navigator.userAgent; //取得浏览器的userAgent字符串
                var isOpera = userAgent.indexOf("Opera") > -1;

                if (isOpera) return "Opera";
                if (userAgent.indexOf("Firefox") > -1) return "FF";
                if (userAgent.indexOf("Chrome") > -1) return "Chrome";
                if (userAgent.indexOf("Safari") > -1) return "Safari";
                //判断是否IE10-11浏览器
                if (userAgent.indexOf("Trident") > -1) {
                    if (userAgent.indexOf("Trident/6.0") > -1) {
                        return "IE10";
                    }
                    if (userAgent.indexOf("Trident/7.0") > -1) {
                        return "IE11";
                    }
                }
                //判断是否IE6-9浏览器
                if (userAgent.indexOf("compatible") > -1 && userAgent.indexOf("MSIE") > -1) {
                    if (userAgent.indexOf("MSIE 6.0") > -1) {
                        return "IE6";
                    }
                    if (userAgent.indexOf("MSIE 7.0") > -1) {
                        return "IE7";
                    }
                    if (userAgent.indexOf("MSIE 8.0") > -1) {
                        return "IE8";
                    }
                    if (userAgent.indexOf("MSIE 9.0") > -1) {
                        return "IE9";
                    }
                    if (userAgent.indexOf("MSIE 10.0") > -1) {
                        return "IE10";
                    }
                    return "IE";
                } else {
                    return userAgent;
                }
            }
        };
    </script>

    <!--加载iconfont-->
    <script src="{{asset('js/zuhao/font.js')}}"></script>
    <!--加载JS-->
    <script type="text/javascript" src="{{asset('js/jquery-1.12.4.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/zuhao/layer.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/zuhao/menuaim_swiper.js')}}"></script>
</head>
<body>

<header class="comm-header space-between hasOpacity">
    <div class="ver-center">
        <a href="/" class="logo ver-center">
            <img src="{{asset('images/logo.png')}}" alt="租号网logo">
            <h1>租号网</h1>
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
                            <li>
                                <a href="">
                                    <img src="picture/5ee19a2803be6.png" alt="英雄LOL">
                                    <span>英雄LOL</span>
                                    <svg class="symbolIcon" aria-hidden="true">
                                        <use xlink:href="#icon-hot"></use>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="picture/5ee19a5ab1969.png" alt="绝地求生">
                                    <span>绝地求生</span>
                                    <svg class="symbolIcon" aria-hidden="true">
                                        <use xlink:href="#icon-hot"></use>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="picture/5ee19ac421f04.png" alt="CF端游">
                                    <span>CF端游</span>
                                    <svg class="symbolIcon" aria-hidden="true">
                                        <use xlink:href="#icon-hot"></use>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="picture/5f326046c6b2d.png" alt="糖豆人">
                                    <span>糖豆人</span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="picture/5ee19b57ca05e.png" alt="逆战">
                                    <span>逆战</span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="picture/5ee19cf23f8b2.png" alt="人类：一败涂地">
                                    <span>人类：一败涂地</span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="picture/5ee19baf90303.png" alt="GTA5online">
                                    <span>GTA5online</span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="picture/5ee19d06841e2.png" alt="CSOL">
                                    <span>CSOL</span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="picture/5ee19bc21fc56.png" alt="黎明杀机">
                                    <span>黎明杀机</span>
                                </a>
                            </li>
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
                            <li>
                                <a href="/glory/">
                                    <img src="picture/5ee19af848f5b.png" alt="王者手游">
                                    <span>王者手游</span>
                                    <svg class="symbolIcon" aria-hidden="true">
                                        <use xlink:href="#icon-hot"></use>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="/gp/">
                                    <img src="picture/5ee19be12675b.png" alt="吃鸡手游">
                                    <span>吃鸡手游</span>
                                    <svg class="symbolIcon" aria-hidden="true">
                                        <use xlink:href="#icon-hot"></use>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="/naruto/">
                                    <img src="picture/5ee19cc8e9dc3.png" alt="火影忍者">
                                    <span>火影忍者</span>
                                    <svg class="symbolIcon" aria-hidden="true">
                                        <use xlink:href="#icon-hot"></use>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="/cfm/">
                                    <img src="picture/5ee19c2bb2d6b.png" alt="CF手游">
                                    <span>CF手游</span>
                                </a>
                            </li>
                            <li>
                                <a href="/speedmobile/">
                                    <img src="picture/5ee1eef8a9cb2.png" alt="飞车(手游)">
                                    <span>飞车(手游)</span>
                                </a>
                            </li>
                            <li>
                                <a href="/bob/">
                                    <img src="picture/5ee19ce0e8fcd.png" alt="球球大作战">
                                    <span>球球大作战</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="ver-center nav">
        <a class="on" href="/">首页</a>
        <a class="" href="/">租号大厅</a>
        <a class="" href="">店铺</a>
        <a class="secondary" href="https://www.yuema.cn/" target="_blank">游戏陪玩</a>
        <a class="" href="">游戏百科</a>
    </nav>
    <div class="ver-center">
        <form class="search" action="/all/" method="get" target="_blank">
            <div class="keywords related-words dropmenu">
                <div class="drop-title">
                    <input type="text" name="keywords" placeholder="搜索" maxlength="38" required="required" autocomplete="off">
                    <svg class="symbolIcon" aria-hidden="true">
                        <use xlink:href="#icon-search"></use>
                    </svg>
                </div>

            </div>

        </form>

        <div class="un-login ver-center" >
            <svg class="symbolIcon" aria-hidden="true">
                <use xlink:href="#icon-user-unlogin"></use>
            </svg>
            <button class="to-login">登录</button>
            <div class="split-line"></div>
            <button class="to-register">注册</button>
        </div>

        <div class="login-ed ver-center" style="display:none">
            <script type="text/html" id="tpl-header-login-ed">
                <a class="msg picture/bfaeffa6eb344778af8a3d1dc85bb1c8.gifunread_msg ? 'has-new': ''}}" href="/my/msg">
                    <svg class="symbolIcon js-hoverAnimate" data-animate="rubberBand" aria-hidden="true">
                        <use xlink:href="#icon-message"></use>
                    </svg>
                    <span class="amount">picture/bfaeffa6eb344778af8a3d1dc85bb1c8.gifunread_msg}}</span>
                </a>
                <div class="user ver-center">
                    <a class="center-center" href="/my">
                        <img src="picture/bfaeffa6eb344778af8a3d1dc85bb1c8.gif'static/' + avatar|generateApiAddr}}"
                             alt="用户头像">
                        <span>picture/bfaeffa6eb344778af8a3d1dc85bb1c8.gif@ nickname}}</span>
                    </a>
                    <div class="sub-menu">
                        <div class="balance">
                            <div>余额：<span>￥picture/bfaeffa6eb344778af8a3d1dc85bb1c8.gifcny/100}}</span></div>
                            <div class="buttons">
                                <a href="/my/recharge">充值</a>
                                <button class="cash ghost">提现</button>
                            </div>
                        </div>
                        <ul class="menu">
                            <li><a href="/my/order">我的订单</a></li>
                            <li><a href="/my/rentorder">我的出租订单</a></li>
                        </ul>
                        <ul class="menu">
                            <li><a class="to-logout" href="">退出登录</a></li>
                        </ul>
                    </div>
                </div>
            </script>
        </div>

        <button class="aside-main-menu-btn">
            <svg class="symbolIcon" aria-hidden="true">
                <use xlink:href="#icon-aside-menu"></use>
            </svg>
        </button>
    </div>
</header>