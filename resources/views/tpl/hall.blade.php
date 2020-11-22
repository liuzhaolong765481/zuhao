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
                                        <a href="javascript:;" class="gameChoose" data-id="{{$item->id}}">{{$item->name}}</a>
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
                                    <a href="javascript:;" class="gameChoose" data-id="{{$item2->id}}">{{$item2->name}}</a>
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


                <ul class="account-list js-mainContent">

                </ul>

                <ul class="pagination">
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

<script type="text/javascript">
    var limit = 14;//每页显示的条数
    var page = 1;//当前页
    var total = 0;
    var o , game_id;

    layui.use(['form', 'layer'],function () {
        load();
    });

    function load(){
        ajaxNoLoading("{{url('account/list')}}", listCallback, {limit:limit,page:page,o:o,game_id:game_id});
    }

    function listCallback(res) {
        var list = res.data.data;
        var str = '';
        $.each(list, function (k, v) {

           str += "   <li>\n" +
               "                        <a class='account-item' href='"+'{{url('account/detail')}}/'+v.id+"'>\n" +
               "                            <div class='tit' title='"+v.title+"'>"+v.title+"</div>" +
               "                            <div class='content space-between'>\n" +
               "                                <div class='ver-center'>\n" +
               "                                    <img class='img' src='"+v.images[0]+"' alt='"+v.title+"'>\n" +
               "                                    <div class='content-left'>\n" +
               "                                        <div class='game-region'>\n" +
               "                                            <span>"+v.game_name+"</span>"+ (v.region_name ? '/'+v.region_name: '') + (v.service_name ? '/'+v.service_name: '') +"\n" +
               "                                        </div>\n" +
               "                                        <div class=\"tags\">\n";
            $.each(v.tags, function (k, v) {
                str += "<span>"+v+"</span>"
            });

            str += "                                        </div>\n" +
               "                                        <div class='renter ver-center'>\n" +
               "                                            <svg class='symbolIcon' aria-hidden='true'>\n" +
               "                                                <use xlink:href='#icon-consumer'></use>\n" +
               "                                            </svg>\n" +
               "                                            <span>平台出租</span>\n" +
               "                                        </div>\n" +
               "                                    </div>\n" +
               "                                </div>\n" +
               "                                <div class='content-right space-between-column'>\n" +
               "                                    <div class='price'><strong>"+v.amount+"</strong> 元 / 小时</div>\n" +
               "                                    <div class='rent-count'>近期出租\n" +
               "                                        <span>"+v.lease_times+"</span> 次\n" +
               "                                    </div>\n" +
               "                                </div>\n" +
               "                            </div>\n" +
               "                        </a>\n" +
               "                    </li>"
        });
        $('.account-list').html(str);
        loadList(res.data.count);
    }
    //加载分页列表
    function loadList(count){
        var str = '';
        //总页数
        var total_page = Math.ceil(count/limit);
        total = total_page;

        if(total_page>1) {
            //上一页
            if(page == 1){
                str += "<li class='page-first disabled'><a href='javascript:;' class='page-link'>首页</a></li>" +
                    "<li class='page-prev disabled'><a href='javascript:;' class='page-link'>上一页</a></li>";
            }else{
                str += "<li class='page-first'><a href='javascript:;' class='page-link'>首页</a></li>" +
                    "<li class='page-prev'><a href='javascript:;' class='page-link'>上一页</a></li>";
            }

            if(page<=3){
                var start_page = 1;
                var end_page = 6;
            }else{
                var start_page = page - 2 ;
                var end_page = page + 3
            }

            for (var i = start_page; i < end_page; i++) {
                //限制条件
                if (i > 0 && i <= total_page) {
                    //判断当前页
                    if (i == page) {
                        str += "<li class='page-item on'><a href='javascript:;' class='page-link'>"+i+"</a></li>";
                    } else {
                        str += "<li class='page-item'><a href='javascript:;' class='page-link'>"+i+"</a></li>";
                    }
                }
            }
            //下一页
            if(page == total_page){
                str += "<li class='page-next disabled'><a href='javascript:;' class='page-link'>下一页</a></li>" +
                    "<li class='page-last disabled'><a href='javascript:;' class='page-link'>尾页</a></li>";
            }else{
                str += "<li class='page-next'><a href='javascript:;' class='page-link'>下一页</a></li>" +
                    "<li class='page-last'><a href='javascript:;' class='page-link'>尾页</a></li>";
            }

            $(".pagination").html(str);
        }
    }


    $("body").on('click','.page-prev',function(){
        if(page>1){
            page--;
        }
        load();
    });
    $("body").on('click','.page-item',function(){
        var p = $(this).text();//取到的是字符串,转化为整数
        page = parseInt(p);
        load();
    });
    $("body").on('click',".page-next",function(){
        if(page < total){
            page++;
        }
        load();
    });

    $("body").on('click',".page-first",function(){
        page = 1;
        load();
    });

    $("body").on('click',".page-last",function(){
        page = total;
        load();
    });

    $('.ver-center span').on('click', function () {
        o = $(this).data('name');
        load();
        $(this).addClass('on').siblings().removeClass('on');
    });

    $('.gameChoose').on('click', function () {
        game_id = $(this).data('id');
        load();
        $(this).parent().addClass('on').siblings().removeClass('on');
    })
</script>

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