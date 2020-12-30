
@include('tpl._include.header')

<div class="w-response breadcrumb" style="margin-top: 90px">
    <a href="/">首页</a>
    <i class="icon icon-crumbs-arrow-big"></i>
    <a href="{{url('hall')}}}">租号大厅</a>
    <i class="icon icon-crumbs-arrow-big"></i>
    <a href="">{{$account->game_name}}</a>
    <i class="icon icon-crumbs-arrow-big"></i>
    <a href="javascript:;" title="{{$account->title}}">{{$account->title}}</a>
</div>
<div class="w-response">
    <section class="detail-top cf">
        <div class="media">
            <div class="media-swiper">
                <div class="media-main swiper-container swiper-no-swiping swiper-container-horizontal">
                    <div class="swiper-wrapper">
                        @foreach($account->images as $k => $item)
                        <div class="swiper-slide @if($k == 0)swiper-slide-active"@endif style="width: 484px; margin-right: 10px;">
                            <img src="{{$item}}" alt="{{$account->title}}">
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="thumbs">
                    <div class="media-btn-prev swiper-button-disabled">
                        <i class="icon icon-media-prev-disabled"></i>
                    </div>
                    <div class="media-thumbs swiper-container swiper-container-horizontal">
                        <div class="swiper-wrapper">
                            @foreach($account->images as $k => $item)
                                <div class="swiper-slide @if($k == 0) active swiper-slide-active @endif " style="width: 70.239px; margin-right: 6px;">
                                    <img src="{{$item}}" alt="{{$account->title}}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="media-btn-next"><i class="icon icon-media-next"></i></div>
                </div>
            </div>
            <div class="tools cf">
                <div class="up fl">
                    {{--<div class="share">--}}
                        {{--<i class="icon icon-share"></i>分享--}}
                        {{--<div class="hover-pop right">--}}
                            {{--<div class="bdsharebuttonbox">--}}
                                {{--<a class="js-hoverSwitchIcon" data-cmd="weixin" title="分享到微信">--}}
                                    {{--<i class="icon icon-friendcircle-sm"></i>--}}
                                {{--</a>--}}
                                {{--<a class="js-hoverSwitchIcon"--}}
                                   {{--title="分享到QQ好友" target="_blank"--}}
                                   {{--href="http://connect.qq.com/widget/shareqq/index.html?url=https://www.zuhao.com/glory/0286ad6effd2b50f&title=王者手游租号-贵8，200多个皮肤，（还有别的限定号需要可➕🐧)卸载🐧不需要验证码，描述有联系方式-账号已租1370次-租号网&summary=王者手游租号什么平台好？来租号网,限时稀有皮肤应有尽有,此王者手游账号已出租0小时,安全可靠。&pics=picture/5ee318c614681.jpg">--}}
                                    {{--<i class="icon icon-qq-sm"></i>--}}
                                {{--</a>--}}
                                {{--<a class="js-hoverSwitchIcon"--}}
                                   {{--title="分享到新浪微博" target="_blank"--}}
                                   {{--href="http://service.weibo.com/share/share.php?url=https://www.zuhao.com/glory/0286ad6effd2b50f&title=王者手游租号-贵8，200多个皮肤，（还有别的限定号需要可➕🐧)卸载🐧不需要验证码，描述有联系方式-账号已租1370次-租号网&summary=王者手游租号什么平台好？来租号网,限时稀有皮肤应有尽有,此王者手游账号已出租0小时,安全可靠。&pics=picture/5ee318c614681.jpg">--}}
                                    {{--<i class="icon icon-weibo-sm"></i>--}}
                                {{--</a>--}}
                                {{--<a class="js-hoverSwitchIcon"--}}
                                   {{--title="分享到QQ空间" target="_blank"--}}
                                   {{--href="https://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=https://www.zuhao.com/glory/0286ad6effd2b50f&title=王者手游租号-贵8，200多个皮肤，（还有别的限定号需要可➕🐧)卸载🐧不需要验证码，描述有联系方式-账号已租1370次-租号网&summary=王者手游租号什么平台好？来租号网,限时稀有皮肤应有尽有,此王者手游账号已出租0小时,安全可靠。&pics=picture/5ee318c614681.jpg">--}}
                                    {{--<i class="icon icon-qzone-sm"></i>--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="collect"><i class="icon icon-collect"></i>关注</div>
                </div>
            </div>
        </div>
        <div class="info">
            <div class="head space-between">
                <div class="info-tit">
                    <h1 class="tit">{{$account->title}}</h1>
                    <p class="sec-tit">
                        <span>{{$account->game_name}}</span>
                        @if($account->region_name)
                            &nbsp;/&nbsp;<span>{{$account->region_name}}</span>
                        @endif
                        @if($account->service_name)
                            &nbsp;/&nbsp;<span>{{$account->service_name}}</span>
                        @endif
                    </p>
                    <p class="tags">
                        @foreach($account->tags as $item)
                        <a href="">{{$item}}</a>
                        @endforeach
                        <span>到时不下线</span>
                    </p>
                </div>
                <div class="seller">
                    <svg class="symbolIcon" aria-hidden="true">
                        <use xlink:href="#icon-consumer"></use>
                    </svg>
                    <div>{{$account->user_nick}}</div>
                </div>
            </div>
            <div class="seller-info cf">
                <div class="item-info fl">
                    <div>
                        <span class="light">租号说明：</span>
                        <a href="" target="_blank">允许排位</a>
                        <a href="" target="_blank">到时不下线</a>
                        <a href="" target="_blank">无理由退款</a>
                    </div>
                    <div>
                        <span class="light">租号押金：</span>
                        <span>
                            <strong class="deposit">{{$account->deposit}}</strong>元
                            <span class="light">（温馨提示:禁止使用外挂，否则将扣除全部押金和租金）</span>
                        </span>
                    </div>
                    <div>
                        <span class="light">上号平台：</span>
                        <span>明文账号密码</span>
                    </div>
                </div>
                <div class="account-info fr">
                    <div class="rent-times">
                        <div>{{$account->lease_times}}</div>
                        <div>出租次数</div>
                    </div>
                    <div class="total-time">
                        <div>{{$account->lease_hour}}</div>
                        <div>累计时间/小时</div>
                    </div>
                </div>
            </div>

            <div class="comm-form" id="rentAttrs-form">
                <div class="form-item-kv">
                    <label>租用类型</label>
                    <ul class="form-item rent-type">
                        <li class="on">
                            <div>
                                <div class="type">时租</div>
                                <div class="unit">1小时起租</div>
                            </div>
                            <div class="fee">¥<span>{{$account->amount}}</span></div>
                        </li>
                        @foreach($account->account_specs as $item)
                        <li>
                            <div>
                                <div class="type">{{$item->specs->specs_name}}</div>
                                <div class="unit">{{number_format($item->price / $item->specs->hours, 2)}}元/小时</div>
                            </div>
                            <div class="fee">¥<span>{{$item->price}}</span></div>
                            <div class="hover-pop bottom">
                                <div>{{$item->specs->descripition}}</div>
                            </div>
                        </li>
                        @endforeach

                    </ul>
                </div>

                <div class="sub-form-items"></div>
                <button class="rent-sure">立即租用/预约</button>
            </div>
        </div>
    </section>

    <section class="detail-content">
        <ul class="mainTab-head tab-head">
            <li class="on">账号信息</li>
            <li>租号说明</li>
            <li class="guide">上号指引</li>
        </ul>
        <div class="mainTab-contents">
            <div class="glory">
                <ul class="statistics">
                    <li>
                        <div class='statistics-item'>
                            <div class='item-txt'>
                                <div>永恒钻石</div>
                                <div>段位</div>
                            </div>
                            <img src="picture/statistics-rank-duo.png">
                        </div>
                    </li>
                    <li>
                        <div class='statistics-item'>
                            <div class='item-txt'>
                                <div>100个</div>
                                <div>英雄数量</div>
                            </div>
                            <img src="picture/statistics-character.png">
                        </div>
                    </li>
                    <li>
                        <div class='statistics-item'>
                            <div class='item-txt'>
                                <div>200个</div>
                                <div>皮肤数量</div>
                            </div>
                            <img src="picture/statistics-skin.png">
                        </div>
                    </li>
                </ul>
                <div class="account-info">
                    <span>角色名称：奶⁡⁡⁡⁠⁠</span>
                    <span>区服：苹果系统-手Q1区-苍天翔龙</span>
                    <span>角色等级：LV30</span>
                    <span>排位赛：允许</span>
                </div>
                <div class="account-desc">
                    <div class="tit">账号描述</div>
                    <p>五虎限定，李信新皮肤，还有其他全限定号，需要Z*hao可以找号主：2643998808，.验证码也加号主，喜欢的可以收藏，玩的开心就好～</p>    </div>
            </div>
            <div class="statement" style="display: none">
                <div class="statement">
                    <div class="tit">租号说明</div>
                    <p>为了更多的玩家能够享受王者荣耀带来的游戏乐趣，我们期望您能遵守以下约定：</p>
                    <ul>
                        <li>
                            <i class="icon icon-dot"></i><span>禁止使用第三方外挂</span>，禁止游戏中辱骂他人，禁止消极游戏和逃跑！
                        </li>
                        <li>
                            <i class="icon icon-dot"></i>租号前请详细查看卖家发布内容，知晓明确禁止内容：例如：标注为禁止打排位的不可以打排位！不允许使用金币和点券等。
                        </li>
                        <li>
                            <i class="icon icon-dot"></i>严禁租赁高段位账号进行“演员”行为。
                        </li>
                        <li>
                            <i class="icon icon-dot"></i>如果用户违反以上禁止内容，卖家有权发起维权申请，客服根据实际情况进行仲裁，有押金的扣除押金补偿卖家！情节严重的统计相关信息追究责任，保留且提交不良信用记录！
                        </li>
                        <li>
                            <i class="icon icon-dot"></i>当您遇到提示密码错误时，请多试几次不要撤单，这是上号器异地登录的原因不是密码错误，给您带来麻烦请谅解。
                        </li>
                    </ul>
                </div>
            </div>
            <div class="guide" style="display: none;">
                <div class="tit">上号说明</div>
                <ul>
                    <li>
                        <i class="icon icon-dot"></i>付款以后请到网页右侧悬浮框——下载上号器——点击 <a href="/down/windows">立即下载</a> 租号上号器——登录租号账号——点击开始游戏进行登录
                    </li>
                    <li>
                        <i class="icon icon-dot"></i>如遇到密码错误，被人顶号等问题，请在 <a href="/my/order">订单</a> 中发起申诉或者 <a href="https://url.cn/C4dZXPsx?_type=wpa&qidian=true">联系客服</a>，我们核实以后会立即处理！
                    </li>
                </ul>
                <br>
                <br>
                <div class="tit">上号流程</div>
                <div class="swiper-container" id="guide-swiper">
                    <ul class="swiper-wrapper">
                        <li class="swiper-slide">
                            <img src="picture/5db01e75acb68.jpg" alt="非上号器上号引导">
                        </li>
                        <li class="swiper-slide">
                            <img src="picture/5db01e8591d77.jpg" alt="非上号器上号引导">
                        </li>
                        <li class="swiper-slide">
                            <img src="picture/5db01ea1aa037.jpg" alt="非上号器上号引导">
                        </li>
                        <li class="swiper-slide">
                            <img src="picture/5db01eb9cc43e.jpg" alt="非上号器上号引导">
                        </li>
                    </ul>
                    <div class="swiper-pagination"></div>
                    <button class="swiper-button-prev"><i class="icon icon-prev"></i></button>
                    <button class="swiper-button-next"><i class="icon icon-next"></i></button>
                </div>
            </div>
        </div>

    </section>


    <section class="recommend">
        <div class="section-tit">
            <h2>推荐商品</h2>
        </div>
        <div class="section-content">
            <ul class="account-list small">
                @foreach($recommend as $item)
                <li>
                    <a class="account-item" href="{{url('account/detail')}}/{{$item->id}}">
                        <div class="tit">{{$item->title}}</div>
                        <div class="sec-tit ver-center">
                            <div class="game-region">
                                <span>{{$item->game_name}}</span>
                                {{$item->region_name ? '/'. $item->region_name : ''}}
                                {{$item->service_name ? '/'. $item->service_name : ''}}
                            </div>
                            <div class="tags">
                            </div>
                        </div>
                        <div class="content space-between">
                            <div class="ver-center">
                                <img class="img" src="{{$item->images[0]}}" alt="{{$item->title}}">
                            </div>
                            <div class="content-right space-between-column">
                                <div class="renter ver-center">
                                    <svg class="symbolIcon" aria-hidden="true">
                                        <use xlink:href="#icon-consumer"></use>
                                    </svg>
                                    <span>{{$item->user_nick}}</span>
                                </div>
                                <div class="price"><strong>{{$item->amount}}</strong> 元 / 小时</div>
                                <div class="rent-count">近期出租 <span>{{$item->lease_times}}</span> 次</div>
                            </div>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </section>
</div>

<script>
    $(".mainTab-head li").each(function(index) {
        $(this).click(function() {
            $(".mainTab-head li.on").removeClass("on");
            $(this).addClass("on");
            $(".mainTab-contents>div:eq(" + index + ")").show().siblings().hide();
        });
    });

    $(".rent-type li").on('click', function () {
        $(this).addClass("on").siblings().removeClass("on")
    });

    /**
     * Swiper初始化
     */
    (function () {
        var $body = $('body'),
            $prevBtn = $('.media-btn-prev'),
            $nextBtn = $('.media-btn-next'),
            $prev = $prevBtn.children('i'),
            $next = $nextBtn.children('i'),

            mediaMain = new Swiper('.media-main', {
                observer: true,
                observeParents: true,
                slidesPerView: 1,
                spaceBetween: 10,
                prevButton: '.media-btn-prev',
                nextButton: '.media-btn-next'
            }),
            mediaThumbs = new Swiper('.media-thumbs', {
                observer: true,
                observeParents: true,
                slideToClickedSlide: true,
                breakpoints: {
                    424: {
                        slidesPerView: 4.85,
                        spaceBetween: 6
                    },
                    1200: {
                        slidesPerView: 3.85,
                        spaceBetween: 6
                    },
                    1450: {
                        slidesPerView: 5.85,
                        spaceBetween: 6
                    },
                    4096: {
                        slidesPerView: 5.85,
                        spaceBetween: 6
                    }
                }
            }),

            mainList = $('.media-main .swiper-wrapper').children(),
            thumbsList = $('.media-thumbs .swiper-wrapper').children(),

            switchBtn = function () {
                if ($prevBtn.hasClass('swiper-button-disabled')) {
                    $prev.addClass('icon-media-prev-disabled').removeClass('icon-media-prev')
                } else {
                    $prev.addClass('icon-media-prev').removeClass('icon-media-prev-disabled')
                }
                if ($nextBtn.hasClass('swiper-button-disabled')) {
                    $next.addClass('icon-media-next-disabled').removeClass('icon-media-next')
                } else {
                    $next.addClass('icon-media-next').removeClass('icon-media-next-disabled')
                }
            };

        // thumbs点击图片与main联动
        $body.on('click', ".media-thumbs .swiper-slide", function () {
            $(".media-thumbs .swiper-slide").removeClass('active');
            $(this).addClass('active');
            var $this = $(this);

            mainList.each(function (index) {
                if (index === $this.index()) {
                    mediaMain.slideTo(index, 500, false);
                } else {
                }
            });

            switchBtn();
        });

        // main分页与thumbs联动
        $body.on('click', ".media-swiper .media-btn-prev, .media-swiper .media-btn-next", function () {
            thumbsList.each(function (index) {
                if (mediaMain.activeIndex === index) {
                    $(this).addClass('active');
                    thumbsActiceIndex = index;
                } else {
                    $(this).removeClass('active')
                }
            });
            mediaThumbs.slideTo(thumbsActiceIndex, 500, false);
            switchBtn();
        });
        switchBtn();

        var $assetsMedia = $('.assets');
        new Swiper($('.swiper-container', $assetsMedia), {
            prevButton: $('.swiper-button-prev', $assetsMedia),
            nextButton: $('.swiper-button-next', $assetsMedia)
        });
    })();

    $('.icon-collect').on('click', function () {

    });

</script>

@include("tpl._include.footer")
