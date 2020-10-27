@include('tpl._include.header')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
<!--左侧-->

<div class="banner swiper-container" id="banner-slider">
    <ul class="swiper-wrapper">
        <li class="swiper-slide">
            <a href="https://www.zuhao.com/tdr/" target="_blank"
               style="background-image: url('images/5f34aabbbd9e8.jpg')"></a>
        </li>
        <li class="swiper-slide">
            <a href="https://www.zuhao.com/ark/" target="_blank"
               style="background-image: url('images/5f69ab7a3501c.png')"></a>
        </li>
        <li class="swiper-slide">
            <a href="https://www.zuhao.com/free/" target="_blank"
               style="background-image: url('images/5f1805694dd2a.jpg')"></a>
        </li>
        <li class="swiper-slide">
            <a href="/activity/rebate/" target="_blank"
               style="background-image: url('images/5ee1a969847dd.png')"></a>
        </li>
        <li class="swiper-slide">
            <a href="https://www.zuhao.com/help/c2fd000004" target="_blank" style="background-image: url('images/5ee1a9593464c.jpg')"></a>
        </li>
        <li class="swiper-slide">
            <a href="/activity/business/" target="_blank"
               style="background-image: url('images/5ee1a97047562.jpg')"></a>
        </li>
    </ul>
    <div class="swiper-pagination">
        <span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span>
        <span class="swiper-pagination-bullet"></span>
    </div>
    <button class="swiper-button-prev">
        <svg class="symbolIcon" aria-hidden="true">
            <use xlink:href="#icon-banner-prev"></use>
        </svg>
    </button>
    <button class="swiper-button-next">
        <svg class="symbolIcon" aria-hidden="true">
            <use xlink:href="#icon-banner-next"></use>
        </svg>
    </button>
</div>



<main class="w-response">
    <section class="second-banner">
        <ul class="swiper-wrapper">
            <li class="swiper-slide">
                <a href="https://www.zuhao.com/free/">点击区域</a>
                <img src="picture/5ee19dcc9815d.png" alt="banner">
            </li>
            <li class="swiper-slide">
                <a href="https://www.zuhao.com/help/2erdv4iu1goz">点击区域</a>
                <img src="picture/5ee19e36941e0.png" alt="banner">
            </li>
            <li class="swiper-slide">
                <a href="https://www.zuhao.com/activity/rebate/">点击区域</a>
                <img src="picture/5ee19e66462f3.png" alt="banner">
            </li>
        </ul>
    </section>

    <section class="hot-games">
        <div class="section-tit cf">
            <h2>热门游戏</h2>
            <a class="more" href="/all/">
                <span>更多</span>
                <i class="icon icon-more"></i>
            </a>
        </div>
        <div class="section-content">
            <ul class="swiper-wrapper">
                <li class="swiper-slide active">
                    <a class="img"
                       href="/lol/"
                       style="background-image: url('images/5ee19c9135bff.png')">
                        <img class="logo"
                             src="picture/5ee19a2803c68.png"
                             alt="英雄LOLLogo">
                    </a>

                    <div class="content">
                        <a href="/lol/"
                           class="tit">英雄LOL</a>
                        <a href="/lol/"
                           class="second-tit"></a>
                        <div class="tags">
                            <a href="/lol/?keywords=%E5%A4%A7%E5%85%83%E7%B4%A0%E4%BD%BF">大元素使</a>
                            <a href="/lol/?keywords=K%2FDA">K/DA</a>
                            <a href="/lol/?keywords=%E6%BA%90%E4%BB%A3%E7%A0%81">源代码</a>
                            <a href="/lol/?keywords=%E9%BE%99%E7%9A%84%E4%BC%A0%E4%BA%BA">龙的传人</a>
                            <a href="/lol/?keywords=%E7%8E%89%E5%89%91%E4%BC%A0%E8%AF%B4">玉剑传说</a>
                        </div>
                        <div class="stores-swiper store">
                            <div class="swiper-wrapper">
                                <a class="swiper-slide"
                                   href="/store/xiaoxiannv/">
                                    <div class="ver-center">
                                        <i class="icon icon-store"></i>
                                        <span class="name">小仙女电玩</span>
                                    </div>
                                    <div>
                                        <span class="activity">租3送1小时</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="swiper-slide ">
                    <a class="img"
                       href="/pubg/"
                       style="background-image: url('images/5ee19cc8843a6.png')">
                        <img class="logo"
                             src="picture/5ee19cc8838cd.png"
                             alt="绝地求生Logo">
                    </a>

                    <div class="content">
                        <a href="/pubg/"
                           class="tit">绝地求生</a>
                        <a href="/pubg/"
                           class="second-tit"></a>
                        <div class="tags">
                            <a href="/pubg/?keywords=%E6%A9%99%E5%AD%90M416">橙子M416</a>
                            <a href="/pubg/?keywords=%E9%95%80%E9%87%91-M416">镀金-M416</a>
                            <a href="/pubg/?keywords=%E6%98%9F%E9%AD%82AKM">星魂AKM</a>
                            <a href="/pubg/?keywords=%E6%A9%99%E7%99%BDM416">橙白M416</a>
                            <a href="/pubg/?keywords=%E5%8C%97%E6%9E%81%E6%95%B0%E5%AD%97-M416">北极数字-M416</a>
                        </div>
                        <div class="stores-swiper store">
                            <div class="swiper-wrapper">
                                <a class="swiper-slide"
                                   href="/store/fubuki/">
                                    <div class="ver-center">
                                        <i class="icon icon-store"></i>
                                        <span class="name">萌妹电玩</span>
                                    </div>
                                    <div>
                                        <span class="activity">租5送2小时</span>
                                        <span class="coupon">满10减1元</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="swiper-slide ">
                    <a class="img"
                       href="/glory/"
                       style="background-image: url('images/5ee19cf353828.png')">
                        <img class="logo"
                             src="picture/5ee19af848fd8.png"
                             alt="王者手游Logo">
                    </a>

                    <div class="content">
                        <a href="/glory/"
                           class="tit">王者手游</a>
                        <a href="/glory/"
                           class="second-tit"></a>
                        <div class="tags">
                            <a href="/glory/?keywords=%E5%87%A4%E6%B1%82%E5%87%B0">凤求凰</a>
                            <a href="/glory/?keywords=%E5%A4%A9%E9%B9%85%E4%B9%8B%E6%A2%A6">天鹅之梦</a>
                            <a href="/glory/?keywords=%E5%80%AA%E5%85%8B%E6%96%AF%E7%A5%9E%E8%B0%95">倪克斯神谕</a>
                            <a href="/glory/?keywords=%E5%A4%AA%E5%8D%8E">太华</a>
                            <a href="/glory/?keywords=%E5%85%A8%E6%81%AF%E7%A2%8E%E5%BD%B1">全息碎影</a>
                        </div>
                        <div class="stores-swiper store">
                            <div class="swiper-wrapper">
                                <a class="swiper-slide"
                                   href="/store/damaozuhao/">
                                    <div class="ver-center">
                                        <i class="icon icon-store"></i>
                                        <span class="name">大毛租号</span>
                                    </div>
                                    <div>
                                        <span class="activity">租3送1小时</span>
                                        <span class="coupon">满10减1元</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="swiper-slide ">
                    <a class="img"
                       href="/cf/"
                       style="background-image: url('images/5ee19ce151c03.png')">
                        <img class="logo"
                             src="picture/5ee19ac421f9f.png"
                             alt="CF端游Logo">
                    </a>

                    <div class="content">
                        <a href="/cf/"
                           class="tit">CF端游</a>
                        <a href="/cf/"
                           class="second-tit"></a>
                        <div class="tags">
                            <a href="/cf/?keywords=%E7%82%AB%E9%87%91%E6%AD%A6%E5%A3%AB">炫金武士</a>
                            <a href="/cf/?keywords=%E7%82%AB%E9%87%91%E4%BF%AE%E7%BD%97">炫金修罗</a>
                            <a href="/cf/?keywords=%E7%82%AB%E9%87%91%E5%A4%A9%E9%BE%99">炫金天龙</a>
                            <a href="/cf/?keywords=%E7%82%AB%E9%87%91%E7%81%AB%E9%BA%92%E9%BA%9F">炫金火麒麟</a>
                            <a href="/cf/?keywords=%E7%8E%8B%E8%80%85%E4%B9%8B%E5%95%B8">王者之啸</a>
                        </div>
                        <div class="stores-swiper store">
                            <div class="swiper-wrapper">
                            </div>
                        </div>
                    </div>
                </li>
                <li class="swiper-slide ">
                    <a class="img"
                       href="/gp/"
                       style="background-image: url('images/5ee1edee02361.png')">
                        <img class="logo"
                             src="picture/5ee19be1267d6.png"
                             alt="吃鸡手游Logo">
                    </a>

                    <div class="content">
                        <a href="/gp/"
                           class="tit">吃鸡手游</a>
                        <a href="/gp/"
                           class="second-tit"></a>
                        <div class="tags">
                            <a href="/gp/?keywords=%E7%8E%9B%E8%8E%8E%E6%8B%89%E8%92%82">玛莎拉蒂</a>
                            <a href="/gp/?keywords=%E4%BA%94%E7%88%AA%E9%87%91%E9%BE%99">五爪金龙</a>
                            <a href="/gp/?keywords=%E9%93%B6%E6%B2%B3%E6%88%98%E7%94%B2">银河战甲</a>
                            <a href="/gp/?keywords=%E5%86%B0%E9%9B%AA%E5%A5%B3%E7%8E%8B">冰雪女王</a>
                        </div>
                        <div class="stores-swiper store">
                            <div class="swiper-wrapper">
                                <a class="swiper-slide"
                                   href="/store/ruigege/">
                                    <div class="ver-center">
                                        <i class="icon icon-store"></i>
                                        <span class="name">芮哥电竞</span>
                                    </div>
                                    <div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <section>
        <div class="section-tit cf">
            <h2>精彩推荐</h2>
        </div>
        <div class="section-content">
            <ul class="comm-item swiper-wrapper">
                <li class="swiper-slide">
                    <div>
                        <a class="img" href="https://www.zuhao.com/store/fubuki/">
                            <img src="picture/5ee6e948a93ad.jpg" alt="萌妹电玩">
                        </a>
                    </div>
                </li>
                <li class="swiper-slide">
                    <div>
                        <a class="img" href="https://www.zuhao.com/store/ruigege/">
                            <img src="picture/5f0bf6876a11f.jpg" alt="芮哥电竞">
                        </a>
                    </div>
                </li>
                <li class="swiper-slide">
                    <div>
                        <a class="img" href="https://www.zuhao.com/store/damaozuhao/">
                            <img src="picture/5ee8424f01623.jpg" alt="大毛租号">
                        </a>
                    </div>
                </li>
                <li class="swiper-slide">
                    <div>
                        <a class="img" href="https://www.zuhao.com/gta5/0b37d18606d2ef91">
                            <img src="picture/5ee6e93051cac.jpg" alt="GTA5体验">
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <section>
        <div class="section-tit cf">
            <h2>活动专区</h2>
        </div>
        <div class="section-content">
            <ul class="comm-item activity swiper-wrapper">
                <li class="swiper-slide">
                    <div>
                        <a class="img" href="https://www.stmbuy.com/zhanghao">
                            <img src="picture/5ee1a09bd318b.jpg"
                                 alt="精品账号任你选购" alt="文案">
                        </a>
                        <div class="info">
                            <a href="https://www.stmbuy.com/zhanghao"
                               class="tit">精品账号任你选购</a>
                            <p class="second-tit">活动时间：2020.06.11 — 2021.01.31</p>
                            <a href="https://www.stmbuy.com/zhanghao" class="btn ver-center">
                                了解详情
                                <svg class="symbolIcon" aria-hidden="true">
                                    <use xlink:href="#icon-arrow-right"></use>
                                </svg>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="swiper-slide">
                    <div>
                        <a class="img" href="https://www.zuhao.com/help/c2fd000004">
                            <img src="picture/5ee19fc5a562c.jpg"
                                 alt="店铺活动" alt="文案">
                        </a>
                        <div class="info">
                            <a href="https://www.zuhao.com/help/c2fd000004"
                               class="tit">店铺活动</a>
                            <p class="second-tit">活动时间：2020.06.11 — 2020.12.31</p>
                            <a href="https://www.zuhao.com/help/c2fd000004" class="btn ver-center">
                                了解详情
                                <svg class="symbolIcon" aria-hidden="true">
                                    <use xlink:href="#icon-arrow-right"></use>
                                </svg>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="swiper-slide">
                    <div>
                        <a class="img" href="https://www.zuhao.com/activity/business/">
                            <img src="picture/5ee1a0ea9b1d9.jpg"
                                 alt="开通店铺分现金，100万现金等你来拿" alt="文案">
                        </a>
                        <div class="info">
                            <a href="https://www.zuhao.com/activity/business/"
                               class="tit">开通店铺分现金，100万现金等你来拿</a>
                            <p class="second-tit">活动时间：2020.06.12 — 2020.12.31</p>
                            <a href="https://www.zuhao.com/activity/business/" class="btn ver-center">
                                了解详情
                                <svg class="symbolIcon" aria-hidden="true">
                                    <use xlink:href="#icon-arrow-right"></use>
                                </svg>
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <section>
        <div class="section-tit cf">
            <h2>新闻快报</h2>
            <a class="more" href="/wiki/">
                <span>更多</span>
                <i class="icon icon-more"></i>
            </a>
        </div>
        <div class="section-content">
            <ul class="comm-item news swiper-wrapper">
                <li class="swiper-slide">
                    <div>
                        <a class="img" href="/wiki/news-c2f5000002">
                            <img src="picture/5ed618461074a.jpg"
                                 alt="拳头新作《Valorant》于今日正式上线">
                        </a>
                        <div class="info">
                            <a href="/wiki/news-c2f5000002"
                               class="tit">拳头新作《Valorant》于今日正式上线</a>
                        </div>
                    </div>
                </li>
                <li class="swiper-slide">
                    <div>
                        <a class="img" href="/wiki/news-c2f5000001">
                            <img src="picture/5ed5f79a09dba.png"
                                 alt="《英雄联盟》玉剑传说 寒潭夭夭 娜美皮肤鉴赏">
                        </a>
                        <div class="info">
                            <a href="/wiki/news-c2f5000001"
                               class="tit">《英雄联盟》玉剑传说 寒潭夭夭 娜美皮肤鉴赏</a>
                        </div>
                    </div>
                </li>
                <li class="swiper-slide">
                    <div>
                        <a class="img" href="/wiki/news-c2da00000q">
                            <img src="picture/5e7dd9bf713e5.png"
                                 alt="《绝地求生》第6赛季世界观宣传片 或暗示新道具">
                        </a>
                        <div class="info">
                            <a href="/wiki/news-c2da00000q"
                               class="tit">《绝地求生》第6赛季世界观宣传片 或暗示新道具</a>
                        </div>
                    </div>
                </li>
                <li class="swiper-slide">
                    <div>
                        <a class="img" href="/wiki/news-c2da00000b">
                            <img src="picture/5e7dcfa07cc05.png"
                                 alt="CF运营不力？游戏最贵道具的诞生">
                        </a>
                        <div class="info">
                            <a href="/wiki/news-c2da00000b"
                               class="tit">CF运营不力？游戏最贵道具的诞生</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
</main>

<script>
    var bannerSwiper = new Swiper('#banner-slider', {
        autoplay: 4000,
        loop: true,
        paginationClickable: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        pagination: '.swiper-pagination',
        autoplayDisableOnInteraction: false
    });

    new Swiper('.stores-swiper', {
        autoplay: 4000,
        direction: 'vertical',
        paginationClickable: true,
        autoplayDisableOnInteraction: false
    });

    $('.hot-games').on('mouseenter', 'li:not(.active)', _.debounce(
        function () {
            $(this).addClass('active').siblings().removeClass('active');
        },
        150
    ));
</script>
@include('tpl._include.footer')