@include('tpl._include.header')
<link rel="stylesheet" href="{{asset('css/hall.css')}}">

<div class="main">
    <div class="w-response">
        <div class="filterSort-box">

            <div class="games space-between">
                <div class="hot-games">
                    @foreach($game as $item)
                        <a class="center-center @if($item->cate_id == 2) mobile @else client @endif " href="javascript:;">
                            <img src="{{$item->poster}}" alt="{{$item->name}}"/>
                            <div class="center-center">{{$item->name}}</div>
                        </a>
                    @endforeach
                </div>
                <div class="more toggle-games fr">
                    <span>展开</span><i class="icon icon-more-arrow"></i>
                </div>
                <div class="all-games" style="display: none">
                    <ul class="root-tab-head">
                        <li class="on">全部游戏</li>
                        @foreach($game_cate as $k => $item)
                        <li>{{$item->cate_name}}</li>
                        @endforeach
                    </ul>
                    <div class="root-tab-content">
                        <div class="content" >
                            <ul class="minor-tab-head">
                                <li class="on">全部</li>
                                <li>A</li>
                                <li>B</li>
                                <li>C</li>
                                <li>D</li>
                                <li>E</li>
                                <li>F</li>
                                <li>G</li>
                                <li>H</li>
                                <li>I</li>
                                <li>J</li>
                                <li>K</li>
                                <li>L</li>
                                <li>M</li>
                                <li>N</li>
                                <li>O</li>
                                <li>P</li>
                                <li>Q</li>
                                <li>R</li>
                                <li>S</li>
                                <li>T</li>
                                <li>U</li>
                                <li>V</li>
                                <li>W</li>
                                <li>X</li>
                                <li>Y</li>
                                <li>Z</li>
                            </ul>
                            <ul class="minor-tab-content">
                                @foreach($game as $item)
                                    <li class="" data-value="{{$item->first_number}}">
                                        <a href="javascript:;">{{$item->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        @foreach($game_cate as $k => $item)
                        <div class="content"  style="display: none" >
                            <ul class="minor-tab-head">
                                <li class="on">全部</li>
                                <li>A</li>
                                <li>B</li>
                                <li>C</li>
                                <li>D</li>
                                <li>E</li>
                                <li>F</li>
                                <li>G</li>
                                <li>H</li>
                                <li>I</li>
                                <li>J</li>
                                <li>K</li>
                                <li>L</li>
                                <li>M</li>
                                <li>N</li>
                                <li>O</li>
                                <li>P</li>
                                <li>Q</li>
                                <li>R</li>
                                <li>S</li>
                                <li>T</li>
                                <li>U</li>
                                <li>V</li>
                                <li>W</li>
                                <li>X</li>
                                <li>Y</li>
                                <li>Z</li>
                            </ul>
                            <ul class="minor-tab-content">
                                @foreach($item->game as $item2)
                                <li class="" data-value="{{$item2->first_number}}">
                                    <a href="javascript:;">{{$item2->name}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>

        <div class="asideLayout-wrap">
            <main>

                <div class="item-head space-between">
                    <div class="filter ver-center">
{{--                        <label class="checkbox">--}}
{{--                            <input id="rentAble" name="state" type="checkbox" value="1" autocomplete="off">--}}
{{--                            <i></i>--}}
{{--                        </label>--}}
{{--                        <label for="rentAble">可立即租用</label>--}}
                    </div>
                    <div class="sort ver-center">
                        <span  class="on">综合排序</span>
                        <span data-name="create_time">最新上架</span>
                        <span data-name="lease_times">销量</span>
                        <span data-name="amount">价格</span>
                    </div>
                </div>


{{--                <ul class="account-list js-mainContent">--}}
{{--                    @foreach($list as $k => $v)--}}
{{--                    <li>--}}
{{--                        <a class="account-item" href="">--}}
{{--                            <div class="tit" title="{{$v->title}}">--}}
{{--                                <span class="tag ios">苹果</span>--}}
{{--                                {{$v->title}}--}}
{{--                            </div>--}}
{{--                            <div class="content space-between">--}}
{{--                                <div class="ver-center">--}}
{{--                                    <img class="img" src="{{$v->images[0]}}" alt="{{$v->title}}">--}}
{{--                                    <div class="content-left">--}}
{{--                                        <div class="game-region">--}}
{{--                                            <span>{{$v->game_name}}</span>--}}
{{--                                            {{$v->region_name ? '/'.$v->region_name :''}}--}}
{{--                                            {{$v->service_name ? '/'.$v->service_name : ''}}                                                                                                    </div>--}}
{{--                                        <div class="tags">--}}
{{--                                            @foreach($v->tags as $item)--}}
{{--                                            <span>{{$item}}</span>--}}
{{--                                            @endforeach--}}
{{--                                        </div>--}}
{{--                                        <div class="renter ver-center">--}}
{{--                                            <svg class="symbolIcon" aria-hidden="true">--}}
{{--                                                <use xlink:href="#icon-consumer"></use>--}}
{{--                                            </svg>--}}
{{--                                            <span>{{$v->user ? $v->user->nick_name : '平台出租'}}</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="content-right space-between-column">--}}
{{--                                    <div class="price"><strong>{{$v->amount}}</strong> 元 / 小时</div>--}}
{{--                                    <div class="rent-count">近期出租--}}
{{--                                        <span>{{$v->lease_times}}</span> 次--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}

                <ul class="pagination">
                    <li class="page-first disabled"><a href="/all/" class="page-link">首页</a></li>
                    <li class="page-prev disabled"><a href="/all/" class="page-link">上一页</a></li>
                    <li class="page-item on"><a href="/all/" class="page-link">1</a></li>
                    <li class="page-item"><a href="/all/p2/" class="page-link">2</a></li>
                    <li class="page-item"><a href="/all/p3/" class="page-link">3</a></li>
                    <li class="page-item"><a href="/all/p4/" class="page-link">4</a></li>
                    <li class="page-item"><a href="/all/p5/" class="page-link">5</a></li>
                    <li class="page-item"><a href="/all/p6/" class="page-link">6</a></li>
                    <li class="page-item"><a href="/all/p7/" class="page-link">7</a></li>
                    <li class="page-next"><a href="/all/p2/" class="page-link">下一页</a></li>
                    <li class="page-last"><a href="/all/p62/" class="page-link">尾页</a></li>
                </ul>

            </main>

            <aside>
                <section class="aside-btn center-center">
                    <a class="center-center" href="{{url('member/publish')}}">
                        <svg class="symbolIcon" aria-hidden="true">
                            <use xlink:href="#icon-edit"></use>
                        </svg>
                        发布账号
                    </a>
                </section>

                <section>
                    <div class="aside-tit">
                        <h3>大家都在租</h3>
                    </div>
                    <ul class="aside-account-list everyoneRentAccount-list">
                        @foreach($account_most as $item)
                        <li>
                            <a href="">
                                <img class="account-img" src="{{$item->images[0]}}" alt="{{$item->title}}">
                                <div class="account-info">
                                    <div class="tit">{{$item->title}}</div>
                                    <div class="sec-tit">
                                        <span class="price">{{$item->amount}}元/小时 </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </section>

                <section>
                    <div class="aside-tit">
                        <h3>大家都在看</h3>
                        <a href="">
                            <span>更多&nbsp;</span>
                            <i class="icon icon-more"></i>
                        </a>
                    </div>
                    <ul class="wiki-list aside">
                        @foreach($article_most as $item)
                        <li>
                            <a href="" title="">
                                <img class="wiki-img" src="{{$item->image}}" alt="{{$item->title}}">
                                <div class="wiki-main">
                                    <h2 class="wiki-tit">{{$item->title}}</h2>
                                    <p class="sec-tit">
                                        <span><i class="icon icon-view"></i>{{$item->follow}}</span>
                                    </p>
                                </div>
                            </a>
                        </li>
                        @endforeach

                    </ul>
                </section>
            </aside>
        </div>
    </div>
</div>


<script>
    $(function () {
        $(".toggle-games").on('click', function () {
            if ($('.all-games').css('display') == 'none') {
                $(this).find('span').text('收起');
                $('.all-games').show(200);
            } else {
                $(this).find('span').text('展示');
                $('.all-games').hide(200);
            }
        });

        $(".root-tab-head li").each(function(index) {
            $(this).click(function() {
                $(".root-tab-head li.on").removeClass("on");
                $(this).addClass("on");
                $(".root-tab-content .content:eq(" + index + ")").show().siblings().hide();
            });
        });

        $('.minor-tab-head li').on('click', function () {
            var choose = $(this).text();
            if(choose === '全部'){
                $(this).parent().next('.minor-tab-content').find('li').css('display', 'inline-block')
            }else{
                $(this).parent().next().find('li').each(function () {
                    if($(this).data('value') != choose){
                        $(this).css('display', 'none')
                    }else{
                        $(this).css('display', 'inline-block')
                    }
                });
            }

            $(this).addClass('on').siblings().removeClass('on')
        });
    })
</script>
@include('tpl._include.footer')