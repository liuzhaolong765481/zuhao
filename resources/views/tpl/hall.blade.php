@include('tpl._include.header')
<link rel="stylesheet" href="{{asset('css/hall.css')}}">

<div class="main">
    <div class="w-response">
        <div class="filterSort-box">

            <div class="games space-between">
                <div class="hot-games">
                    @foreach($game_cate as $item)
                        <a class="center-center @if($item->cate_id == 2) mobile @else client @endif " href="">
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
                        <li>端游</li>
                        <li>手游</li>
                        <li>STEAM</li>
                        <li>其他</li>
                    </ul>
                    <div class="root-tab-content">
                        <div class="content">
                            <ul class="minor-tab-head">
                                <li class="on">热门</li>
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
                                <li class=""
                                    data-value="Y">
                                    <a href="/lol/">英雄LOL</a>
                                </li>
                                <li class=""
                                    data-value="J">
                                    <a href="/pubg/">绝地求生</a>
                                </li>
                                <li class=""
                                    data-value="W">
                                    <a href="/glory/">王者手游</a>
                                </li>
                                <li class=""
                                    data-value="C">
                                    <a href="/cf/">CF端游</a>
                                </li>
                                <li class=""
                                    data-value="H">
                                    <a href="/gp/">吃鸡手游</a>
                                </li>
                                <li class=""
                                    data-value="N">
                                    <a href="/naruto/">火影忍者</a>
                                </li>
                                <li class=""
                                    data-value="C">
                                    <a href="/cfm/">CF手游</a>
                                </li>
                                <li class=""
                                    data-value="F">
                                    <a href="/tdr/">糖豆人</a>
                                </li>
                                <li class=""
                                    data-value="N">
                                    <a href="/nz/">逆战</a>
                                </li>
                                <li class=""
                                    data-value="Q">
                                    <a href="/speedmobile/">飞车(手游)</a>
                                </li>
                                <li class=""
                                    data-value="H">
                                    <a href="/hff/">人类：一败涂地</a>
                                </li>
                                <li class=""
                                    data-value="G">
                                    <a href="/gta5/">GTA5online</a>
                                </li>
                                <li class=""
                                    data-value="B">
                                    <a href="/bob/">球球大作战</a>
                                </li>
                                <li class=""
                                    data-value="C">
                                    <a href="/csol/">CSOL</a>
                                </li>
                                <li class=""
                                    data-value="R">
                                    <a href="/rain/">雨中冒险2</a>
                                </li>
                                <li class=""
                                    data-value="L">
                                    <a href="/dd/">黎明杀机</a>
                                </li>
                                <li class=""
                                    data-value="S">
                                    <a href="/shooter/">生死狙击</a>
                                </li>
                                <li class=""
                                    data-value="A">
                                    <a href="/ark/">方舟：生存进化</a>
                                </li>
                                <li class=""
                                    data-value="S">
                                    <a href="/sot/">盗贼之海</a>
                                </li>
                                <li class=""
                                    data-value="S">
                                    <a href="/rs/">彩虹6号：围攻</a>
                                </li>
                            </ul>
                        </div>
                        <div class="content" style="display: none;">
                            <ul class="minor-tab-head">
                                <li class="on">热门</li>
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
                                <li class=""
                                    data-value="Y">
                                    <a href="/lol/">英雄LOL</a>
                                </li>
                                <li class=""
                                    data-value="J">
                                    <a href="/pubg/">绝地求生</a>
                                </li>
                                <li class=""
                                    data-value="C">
                                    <a href="/cf/">CF端游</a>
                                </li>
                                <li class=""
                                    data-value="F">
                                    <a href="/tdr/">糖豆人</a>
                                </li>
                                <li class=""
                                    data-value="N">
                                    <a href="/nz/">逆战</a>
                                </li>
                                <li class=""
                                    data-value="H">
                                    <a href="/hff/">人类：一败涂地</a>
                                </li>
                                <li class=""
                                    data-value="G">
                                    <a href="/gta5/">GTA5online</a>
                                </li>
                                <li class=""
                                    data-value="C">
                                    <a href="/csol/">CSOL</a>
                                </li>
                                <li class=""
                                    data-value="L">
                                    <a href="/dd/">黎明杀机</a>
                                </li>
                            </ul>
                        </div>
                        <div class="content" style="display: none;">
                            <ul class="minor-tab-head">
                                <li class="on">热门</li>
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
                                <li class=""
                                    data-value="W">
                                    <a href="/glory/">王者手游</a>
                                </li>
                                <li class=""
                                    data-value="H">
                                    <a href="/gp/">吃鸡手游</a>
                                </li>
                                <li class=""
                                    data-value="N">
                                    <a href="/naruto/">火影忍者</a>
                                </li>
                                <li class=""
                                    data-value="C">
                                    <a href="/cfm/">CF手游</a>
                                </li>
                                <li class=""
                                    data-value="Q">
                                    <a href="/speedmobile/">飞车(手游)</a>
                                </li>
                                <li class=""
                                    data-value="B">
                                    <a href="/bob/">球球大作战</a>
                                </li>
                            </ul>
                        </div>
                        <div class="content" style="display: none;">
                            <ul class="minor-tab-head">
                                <li class="on">热门</li>
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
                                <li class=""
                                    data-value="J">
                                    <a href="/pubg/">绝地求生</a>
                                </li>
                                <li class=""
                                    data-value="F">
                                    <a href="/tdr/">糖豆人</a>
                                </li>
                                <li class=""
                                    data-value="H">
                                    <a href="/hff/">人类：一败涂地</a>
                                </li>
                                <li class=""
                                    data-value="G">
                                    <a href="/gta5/">GTA5online</a>
                                </li>
                                <li class=""
                                    data-value="R">
                                    <a href="/rain/">雨中冒险2</a>
                                </li>
                                <li class=""
                                    data-value="L">
                                    <a href="/dd/">黎明杀机</a>
                                </li>
                                <li class=""
                                    data-value="A">
                                    <a href="/ark/">方舟：生存进化</a>
                                </li>
                                <li class=""
                                    data-value="S">
                                    <a href="/sot/">盗贼之海</a>
                                </li>
                                <li class=""
                                    data-value="S">
                                    <a href="/rs/">彩虹6号：围攻</a>
                                </li>
                            </ul>
                        </div>
                        <div class="content" style="display: none;">
                            <ul class="minor-tab-head">
                                <li class="on">热门</li>
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
                                <li class=""
                                    data-value="S">
                                    <a href="/shooter/">生死狙击</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hidden-options" style="display: none;">
            </div>
        </div>

        <div class="asideLayout-wrap">
            <main>

                <div class="item-head space-between">
                    <div class="filter ver-center">
                        <label class="checkbox">
                            <input id="rentAble" name="state" type="checkbox" value="1" autocomplete="off">
                            <i></i>
                        </label>
                        <label for="rentAble">可立即租用</label>
                    </div>
                    <div class="sort ver-center">
                        <span  class="on">综合排序</span>
                        <span data-name="-itime">最新上架</span>
                        <span data-name="-rent_num">销量</span>
                        <span data-name="hour_price">价格</span>
                    </div>
                </div>


                <ul class="account-list js-mainContent">
                    <li>
                        <a class="account-item" href="/glory/0286ad6effd2b50f">
                            <div class="tit" title="贵8，200多个皮肤，（还有别的限定号需要可➕🐧)卸载🐧不需要验证码，描述有联系方式">
                                <span class="tag ios">苹果</span>
                                贵8，200多个皮肤，（还有别的限定号需要可➕🐧)卸载🐧不需要验证码，描述有联系方式                                    </div>
                            <div class="content space-between">
                                <div class="ver-center">
                                    <img class="img"
                                         src="picture/5ee318c614681_240x0.jpg"
                                         alt="贵8，200多个皮肤，（还有别的限定号需要可➕🐧)卸载🐧不需要验证码，描述有联系方式">
                                    <div class="content-left">
                                        <div class="game-region">
                                            <span>王者手游</span>
                                            /
                                            苹果系统
                                            /
                                            手Q1区-苍天翔龙                                                                                                    </div>
                                        <div class="tags">
                                        </div>
                                        <div class="renter ver-center">
                                            <svg class="symbolIcon" aria-hidden="true">
                                                <use xlink:href="#icon-consumer"></use>
                                            </svg>
                                            <span>➕2643998808</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-right space-between-column">
                                    <div class="price"><strong>5</strong> 元 / 小时</div>
                                    <div class="rent-count">近期出租
                                        <span>1370</span> 次
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                </ul>

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
                    <a class="center-center"
                       href="javascript: Zuhao.checkLogin(function(){window.open('/my/release')});void(0);">
                        <svg class="symbolIcon" aria-hidden="true">
                            <use xlink:href="#icon-edit"></use>
                        </svg>
                        发布账号
                    </a>
                </section>

                <section>
                    <div class="aside-tit">
                        <h3>大家都在租</h3>
                        <!-- <a href="">
                            <span>更多&nbsp;</span>
                            <i class="icon icon-more"></i>
                        </a> -->
                    </div>
                    <ul class="aside-account-list everyoneRentAccount-list">
                        <li>
                            <a href="/gp/d3912cec416cacaf">
                                <img class="account-img"
                                     src="picture/5ee33ff936a5e_65x0.jpg" alt="账号封面">
                                <div class="account-info">
                                    <div class="tit">黑色特斯拉粉色玛莎金风玉露花仙子全套7极五爪最新手册已买</div>
                                    <div class="sec-tit">
                                        <span class="price">6元/小时 </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/gp/b7e312b485ffe088">
                                <img class="account-img"
                                     src="picture/5ee33ff936a5e_65x0.jpg" alt="账号封面">
                                <div class="account-info">
                                    <div class="tit">「蓝色玛莎」注意！验证码➕🐧最新手册已买碟舞迷情全套四级五爪金龙雪国幻梦全套朱雀白虎</div>
                                    <div class="sec-tit">
                                        <span class="price">4.75元/小时 </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/gp/a0591d391c4e1cd3">
                                <img class="account-img"
                                     src="picture/5ee33ff936a5e_65x0.jpg" alt="账号封面">
                                <div class="account-info">
                                    <div class="tit">蓝色玛莎*雪国幻梦全套*精灵氛围*七十枪械皮肤*三特效枪akscarl五爪金龙双特效枪都四级*最新手册已买</div>
                                    <div class="sec-tit">
                                        <span class="price">5.35元/小时 </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/pubg/a02a57bb6df33fdc">
                                <img class="account-img"
                                     src="picture/20200930565569a02a57bb6df33fdc_65x0.jpg" alt="账号封面">
                                <div class="account-info">
                                    <div class="tit">【萌妹电玩】沙漠迷彩M4⭐蓝摩手套⭐鲨鱼牙面巾等百件库存低分段排位炸鱼带妹练手号</div>
                                    <div class="sec-tit">
                                        <span class="price">1元/小时 </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/pubg/e892d1a79495316e">
                                <img class="account-img"
                                     src="picture/20200930740457e892d1a79495316e_65x0.jpg" alt="账号封面">
                                <div class="account-info">
                                    <div class="tit">【萌妹电玩】粉色M416⭐粉色连帽卫衣⭐低分段天梯炸鱼小号3n6V</div>
                                    <div class="sec-tit">
                                        <span class="price">2元/小时 </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/pubg/f34c777e1c809b58">
                                <img class="account-img"
                                     src="picture/20200930811122f34c777e1c809b58_65x0.jpg" alt="账号封面">
                                <div class="account-info">
                                    <div class="tit">【萌妹电玩】星魂AKM套装⭐XDD套装⭐粉色M416⭐粉色连帽卫衣等百件库存HY86</div>
                                    <div class="sec-tit">
                                        <span class="price">3元/小时 </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/glory/d11c93948b1ba236">
                                <img class="account-img"
                                     src="picture/5ee318c614681_65x0.jpg" alt="账号封面">
                                <div class="account-info">
                                    <div class="tit">93英雄84皮肤v6荣耀水晶※星空梦想※地狱火※飞横※曙光守护者※地狱之眼※敏锐之力※末日机甲禁止掉分素质游戏※违规*拉黑冻结账户</div>
                                    <div class="sec-tit">
                                        <span class="price">2元/小时 </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/glory/a749f80573a1737c">
                                <img class="account-img"
                                     src="picture/5ee318c614681_65x0.jpg" alt="账号封面">
                                <div class="account-info">
                                    <div class="tit">荣耀典藏（撩妹）102全英雄132皮肤v8荣耀※倪克斯神谕※天俄之梦※仲夏夜之梦※凤凰于飞※热情桑巴※功夫厨神※电玩小子※霸王别姬禁止掉分素质游戏※违规*拉黑冻结账户</div>
                                    <div class="sec-tit">
                                        <span class="price">4元/小时 </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/glory/8f428c970f00c3b6">
                                <img class="account-img"
                                     src="picture/5ee318c614681_65x0.jpg" alt="账号封面">
                                <div class="account-info">
                                    <div class="tit">荣耀典藏（撩妹）101英雄123皮肤v8荣耀※杀手不太冷※至尊宝※凤求凰※功夫厨神※逐梦之影※久胜战神※乘风破浪※魔法小厨娘禁止掉分素质游戏※违规*拉黑冻结账户</div>
                                    <div class="sec-tit">
                                        <span class="price">3.5元/小时 </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/gp/d3912cec416cacaf">
                                <img class="account-img"
                                     src="picture/5ee33ff936a5e_65x0.jpg" alt="账号封面">
                                <div class="account-info">
                                    <div class="tit">黑色特斯拉粉色玛莎金风玉露花仙子全套7极五爪最新手册已买</div>
                                    <div class="sec-tit">
                                        <span class="price">6元/小时 </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <script type="text/html" id="tpl-everyoneRentAccount">
                        picture/9036712c94c24fa98884af60a47beadb.gifeach list as item}}
                        <li>
                            <a href="/picture/9036712c94c24fa98884af60a47beadb.gifitem.goods_info.game_idname}}/picture/9036712c94c24fa98884af60a47beadb.gifitem.goods_info._id}}">
                                <img class="account-img" src="/static/picture/9036712c94c24fa98884af60a47beadb.gifitem.goods_info.cover}}" alt="账号封面">
                                <div class="account-info">
                                    <div class="tit">picture/9036712c94c24fa98884af60a47beadb.gifitem.goods_info.goods_name}}</div>
                                    <div class="sec-tit">
                                        <span class="price">picture/9036712c94c24fa98884af60a47beadb.gifitem.goods_info.hour_price/100}}元/小时 </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        picture/9036712c94c24fa98884af60a47beadb.gif/each}}
                    </script>
                </section>

                <section>
                    <div class="aside-tit">
                        <h3>大家都在看</h3>
                        <a href="/wiki/">
                            <span>更多&nbsp;</span>
                            <i class="icon icon-more"></i>
                        </a>
                    </div>
                    <ul class="wiki-list aside">
                        <li>
                            <a href="/wiki/news-c2f5000002"
                               title="拳头新作《Valorant》于今日正式上线">
                                <img class="wiki-img" src="picture/5ed618461074a.jpg"
                                     alt="拳头新作《Valorant》于今日正式上线">
                                <div class="wiki-main">
                                    <h2 class="wiki-tit">拳头新作《Valorant》于今日正式上线</h2>
                                    <p class="sec-tit">
                                        <span><i class="icon icon-view"></i>418</span>
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/wiki/news-c2f5000001"
                               title="《英雄联盟》玉剑传说 寒潭夭夭 娜美皮肤鉴赏">
                                <img class="wiki-img" src="picture/5ed5f79a09dba.png"
                                     alt="《英雄联盟》玉剑传说 寒潭夭夭 娜美皮肤鉴赏">
                                <div class="wiki-main">
                                    <h2 class="wiki-tit">《英雄联盟》玉剑传说 寒潭夭夭 娜美皮肤鉴赏</h2>
                                    <p class="sec-tit">
                                        <span><i class="icon icon-view"></i>362</span>
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/wiki/news-c2da00000q"
                               title="《绝地求生》第6赛季世界观宣传片 或暗示新道具">
                                <img class="wiki-img" src="picture/5e7dd9bf713e5.png"
                                     alt="《绝地求生》第6赛季世界观宣传片 或暗示新道具">
                                <div class="wiki-main">
                                    <h2 class="wiki-tit">《绝地求生》第6赛季世界观宣传片 或暗示新道具</h2>
                                    <p class="sec-tit">
                                        <span><i class="icon icon-view"></i>542</span>
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/wiki/news-c2da00000b"
                               title="CF运营不力？游戏最贵道具的诞生">
                                <img class="wiki-img" src="picture/5e7dcfa07cc05.png"
                                     alt="CF运营不力？游戏最贵道具的诞生">
                                <div class="wiki-main">
                                    <h2 class="wiki-tit">CF运营不力？游戏最贵道具的诞生</h2>
                                    <p class="sec-tit">
                                        <span><i class="icon icon-view"></i>770</span>
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/wiki/news-c2da00000r"
                               title="《绝地求生》三周年纪念视频：感谢玩家陪伴、继续优化体验">
                                <img class="wiki-img" src="picture/5e7dda4931bac.png"
                                     alt="《绝地求生》三周年纪念视频：感谢玩家陪伴、继续优化体验">
                                <div class="wiki-main">
                                    <h2 class="wiki-tit">《绝地求生》三周年纪念视频：感谢玩家陪伴、继续优化体验</h2>
                                    <p class="sec-tit">
                                        <span><i class="icon icon-view"></i>371</span>
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/wiki/news-c2da00000s"
                               title="《绝地求生》武器性能分析&mdash;&mdash;KAR 98K">
                                <img class="wiki-img" src="picture/5e7ddb7fe4bb6.jpg"
                                     alt="《绝地求生》武器性能分析&mdash;&mdash;KAR 98K">
                                <div class="wiki-main">
                                    <h2 class="wiki-tit">《绝地求生》武器性能分析&mdash;&mdash;KAR 98K</h2>
                                    <p class="sec-tit">
                                        <span><i class="icon icon-view"></i>385</span>
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/wiki/news-c2da00000t"
                               title="《绝地求生》主机版公共测试服务器更新 跨平台联机、团队死亡竞赛等">
                                <img class="wiki-img" src="picture/5e7ddc7f190df.png"
                                     alt="《绝地求生》主机版公共测试服务器更新 跨平台联机、团队死亡竞赛等">
                                <div class="wiki-main">
                                    <h2 class="wiki-tit">《绝地求生》主机版公共测试服务器更新 跨平台联机、团队死亡竞赛等</h2>
                                    <p class="sec-tit">
                                        <span><i class="icon icon-view"></i>383</span>
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/wiki/news-c2da00000f"
                               title="理性分析，穿越火线M60不出英雄级的原因">
                                <img class="wiki-img" src="picture/5e7dd24c47e3b.jpg"
                                     alt="理性分析，穿越火线M60不出英雄级的原因">
                                <div class="wiki-main">
                                    <h2 class="wiki-tit">理性分析，穿越火线M60不出英雄级的原因</h2>
                                    <p class="sec-tit">
                                        <span><i class="icon icon-view"></i>502</span>
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/wiki/news-c2da00000u"
                               title="COD吃鸡模式大热，&ldquo;买活&rdquo;机制有待PUBG借鉴​​">
                                <img class="wiki-img" src="picture/5e7ddd899fc3c.png"
                                     alt="COD吃鸡模式大热，&ldquo;买活&rdquo;机制有待PUBG借鉴​​">
                                <div class="wiki-main">
                                    <h2 class="wiki-tit">COD吃鸡模式大热，&ldquo;买活&rdquo;机制有待PUBG借鉴​​</h2>
                                    <p class="sec-tit">
                                        <span><i class="icon icon-view"></i>367</span>
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/wiki/news-c2da00000v"
                               title="必看！《绝地求生》提升枪法攻略">
                                <img class="wiki-img" src="picture/5e7dde463d084.png"
                                     alt="必看！《绝地求生》提升枪法攻略">
                                <div class="wiki-main">
                                    <h2 class="wiki-tit">必看！《绝地求生》提升枪法攻略</h2>
                                    <p class="sec-tit">
                                        <span><i class="icon icon-view"></i>359</span>
                                    </p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </section>
            </aside>
        </div>
    </div>
</div>


<script>
    $(function () {
       $(".toggle-games").on('click', function () {
           if($('.all-games').css('display') == 'none'){
               $(this).find('span').text('收起');
               $('.all-games').show(200);
           }else{
               $(this).find('span').text('展示');
               $('.all-games').hide(20  0);
           }
       })
    })
</script>
@include('tpl._include.footer')