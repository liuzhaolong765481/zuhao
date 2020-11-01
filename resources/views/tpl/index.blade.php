@include('tpl._include.header')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
<!--左侧-->
<!--banner-->
<div class="banner swiper-container" id="banner-slider">
    <ul class="swiper-wrapper">
        @foreach($banner as  $item)
        <li class="swiper-slide">
            <a href="{{$item->href}}" target="_blank"
               style="background-image: url('{{$item->image}}')"></a>
        </li>
        @endforeach
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
                <a href="">点击区域</a>
                <img src="{{asset('images/index_free.png')}}" alt="banner">
            </li>
            <li class="swiper-slide">
                <a href="">点击区域</a>
                <img src="{{asset('images/index_help.png')}}" alt="banner">
            </li>
            <li class="swiper-slide">
                <a href="">点击区域</a>
                <img src="{{asset('images/index_share.png')}}" alt="banner">
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
                @foreach($index_game as $k => $item)
                <li class="swiper-slide @if($k==0) active @endif">
                    <a class="img" href="" style="background-image: url('{{$item->index_poster}}')">
                        <img class="logo" src="{{$item->icon}}" alt="{{$item->name}}">
                    </a>

                    <div class="content">
                        <a href="" class="tit">{{$item->name}}</a>
                        <a href="" class="second-tit"></a>
                        <div class="tags">
                            @foreach($item->sku as $item2)
                            <a href="">{{$item2->sku_name}}</a>
                            @endforeach
                        </div>

                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </section>

    <section>
        <div class="section-tit cf">
            <h2>新闻快报</h2>
            <a class="more" href="">
                <span>更多</span>
                <i class="icon icon-more"></i>
            </a>
        </div>
        <div class="section-content">
            <ul class="comm-item news swiper-wrapper">
                @foreach($article as $item)
                <li class="swiper-slide">
                    <div>
                        <a class="img" href="">
                            <img src="{{$item->image}}" alt="{{$item->title}}">
                        </a>
                        <div class="info">
                            <a href="" class="tit">{{$item->title}}</a>
                        </div>
                    </div>
                </li>
               @endforeach
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