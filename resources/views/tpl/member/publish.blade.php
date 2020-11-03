@include('tpl._include.header')

<div class="w-response breadcrumb">
    <a href="/">租号首页</a>
    <i class="icon icon-crumbs-arrow-big"></i>
    <h1>个人中心</h1>
</div>

<div class="w-response my-center">
    <button class="aside-minor-menu-btn">菜单</button>
    @include('tpl._include.left')

    <div class="main-content publish-account">
        <div class="page-title">
            <span class="tit">发布账号</span>
            <span class="tip" style="">
            <img src="{{asset('images/error-head-bg.png')}}">
            <span>当前已发布账号 <em class="published-num">0</em> / <em>5</em> 个，快去开通发布无限制吧！</span>
            <a href="">查看详情 》</a>
        </span>
        </div>
        <form class="comm-form layui-form" id="publishForm" novalidate="novalidate">
            <h2>
                <span>1</span>
                <span>选择游戏区服</span>
            </h2>
            <div class="form-item-kv inline small">
                <label>选择游戏：</label>
                <div class="form-item">
                    <div class="dropmenu">
                        <div class="drop-title">
                            <input class="extraInfo-need" autocomplete="off" name="game_name" type="text"
                                   placeholder="选择游戏" readonly="readonly" value="">
                            <i class="edge"></i>
                        </div>
                        <dl class="drop-menu" style="">
                            <dd data-value="25n000002"><a href="/my/release?game=英雄联盟">英雄联盟</a></dd>
                            <dd data-value="25n000003"><a href="/my/release?game=绝地求生">绝地求生</a></dd>
                            <dd data-value="261000004"><a href="/my/release?game=王者荣耀">王者荣耀</a></dd>
                            <dd data-value="261000003"><a href="/my/release?game=穿越火线">穿越火线</a></dd>
                            <dd data-value="c2ch000001"><a href="/my/release?game=和平精英">和平精英</a></dd>
                            <dd data-value="c2cy000002"><a href="/my/release?game=火影忍者">火影忍者</a></dd>
                            <dd data-value="c2cy000001"><a href="/my/release?game=穿越火线-枪战王者">穿越火线-枪战王者</a></dd>
                            <dd data-value="c2h3000001"><a href="/my/release?game=糖豆人">糖豆人</a></dd>
                            <dd data-value="261000008"><a href="/my/release?game=逆战">逆战</a></dd>
                            <dd data-value="26100000a"><a href="/my/release?game=QQ飞车(手游)">QQ飞车(手游)</a></dd>
                            <dd data-value="c2eh000001"><a href="/my/release?game=人类：一败涂地">人类：一败涂地</a></dd>
                            <dd data-value="26100000g"><a href="/my/release?game=GTA5online">GTA5online</a></dd>
                            <dd data-value="c2dy000001"><a href="/my/release?game=球球大作战">球球大作战</a></dd>
                            <dd data-value="c2f3000001"><a href="/my/release?game=CSOL">CSOL</a></dd>
                            <dd data-value="c2i2000001"><a href="/my/release?game=雨中冒险2">雨中冒险2</a></dd>
                            <dd data-value="26100000h"><a href="/my/release?game=黎明杀机">黎明杀机</a></dd>
                            <dd data-value="c2gh000001"><a href="/my/release?game=生死狙击">生死狙击</a></dd>
                            <dd data-value="c2i2000002"><a href="/my/release?game=方舟：生存进化">方舟：生存进化</a></dd>
                            <dd data-value="c2i4000001"><a href="/my/release?game=盗贼之海">盗贼之海</a></dd>
                            <dd data-value="c2i4000002"><a href="/my/release?game=彩虹6号：围攻">彩虹6号：围攻</a></dd>
                        </dl>
                        <input id="game-id" type="hidden" name="game_id" value="">
                    </div>
                </div>
            </div>
            <script>
                $(document).bind("click",function(e){
                    var target = $(e.target);
                    if(target.closest(".extraInfo-need").length == 0){
                                                               //do something...
                    }
                })

                $('.extraInfo-need').on('click', function () {
                    var item = $(this).parents('.dropmenu').find('.drop-menu');
                    if(item.css('display') === 'none'){
                        item.css('display','block')
                    }else{
                        item.css('display','none')
                    }
                })
            </script>
            <!--选择区服-->
            <div class="form-item-kv inline small">
                <label>选择游戏：</label>
                <div class="form-item">
                    <div class="dropmenu">
                        <div class="drop-title">
                            <input class="extraInfo-need" autocomplete="off" name="game_name" type="text"
                                   placeholder="选择游戏" readonly="readonly" value="">
                            <i class="edge"></i>
                        </div>
                        <dl class="drop-menu" style="">
                            <dd data-value="25n000002"><a href="/my/release?game=英雄联盟">英雄联盟</a></dd>
                            <dd data-value="25n000003"><a href="/my/release?game=绝地求生">绝地求生</a></dd>
                            <dd data-value="261000004"><a href="/my/release?game=王者荣耀">王者荣耀</a></dd>
                            <dd data-value="261000003"><a href="/my/release?game=穿越火线">穿越火线</a></dd>
                            <dd data-value="c2ch000001"><a href="/my/release?game=和平精英">和平精英</a></dd>
                            <dd data-value="c2cy000002"><a href="/my/release?game=火影忍者">火影忍者</a></dd>
                            <dd data-value="c2cy000001"><a href="/my/release?game=穿越火线-枪战王者">穿越火线-枪战王者</a></dd>
                            <dd data-value="c2h3000001"><a href="/my/release?game=糖豆人">糖豆人</a></dd>
                            <dd data-value="261000008"><a href="/my/release?game=逆战">逆战</a></dd>
                            <dd data-value="26100000a"><a href="/my/release?game=QQ飞车(手游)">QQ飞车(手游)</a></dd>
                            <dd data-value="c2eh000001"><a href="/my/release?game=人类：一败涂地">人类：一败涂地</a></dd>
                            <dd data-value="26100000g"><a href="/my/release?game=GTA5online">GTA5online</a></dd>
                            <dd data-value="c2dy000001"><a href="/my/release?game=球球大作战">球球大作战</a></dd>
                            <dd data-value="c2f3000001"><a href="/my/release?game=CSOL">CSOL</a></dd>
                            <dd data-value="c2i2000001"><a href="/my/release?game=雨中冒险2">雨中冒险2</a></dd>
                            <dd data-value="26100000h"><a href="/my/release?game=黎明杀机">黎明杀机</a></dd>
                            <dd data-value="c2gh000001"><a href="/my/release?game=生死狙击">生死狙击</a></dd>
                            <dd data-value="c2i2000002"><a href="/my/release?game=方舟：生存进化">方舟：生存进化</a></dd>
                            <dd data-value="c2i4000001"><a href="/my/release?game=盗贼之海">盗贼之海</a></dd>
                            <dd data-value="c2i4000002"><a href="/my/release?game=彩虹6号：围攻">彩虹6号：围攻</a></dd>
                        </dl>
                        <input id="game-id" type="hidden" name="game_id" value="">
                    </div>


                </div>
            </div>

            <div class="form-item-kv inline small">
                <label>选择游戏：</label>
                <div class="form-item">
                    <div class="dropmenu">
                        <div class="drop-title">
                            <input class="extraInfo-need" autocomplete="off" name="game_name" type="text"
                                   placeholder="选择游戏" readonly="readonly" value="">
                            <i class="edge"></i>
                        </div>
                        <dl class="drop-menu" style="">
                            <dd data-value="25n000002"><a href="/my/release?game=英雄联盟">英雄联盟</a></dd>
                            <dd data-value="25n000003"><a href="/my/release?game=绝地求生">绝地求生</a></dd>
                            <dd data-value="261000004"><a href="/my/release?game=王者荣耀">王者荣耀</a></dd>
                            <dd data-value="261000003"><a href="/my/release?game=穿越火线">穿越火线</a></dd>
                            <dd data-value="c2ch000001"><a href="/my/release?game=和平精英">和平精英</a></dd>
                            <dd data-value="c2cy000002"><a href="/my/release?game=火影忍者">火影忍者</a></dd>
                            <dd data-value="c2cy000001"><a href="/my/release?game=穿越火线-枪战王者">穿越火线-枪战王者</a></dd>
                            <dd data-value="c2h3000001"><a href="/my/release?game=糖豆人">糖豆人</a></dd>
                            <dd data-value="261000008"><a href="/my/release?game=逆战">逆战</a></dd>
                            <dd data-value="26100000a"><a href="/my/release?game=QQ飞车(手游)">QQ飞车(手游)</a></dd>
                            <dd data-value="c2eh000001"><a href="/my/release?game=人类：一败涂地">人类：一败涂地</a></dd>
                            <dd data-value="26100000g"><a href="/my/release?game=GTA5online">GTA5online</a></dd>
                            <dd data-value="c2dy000001"><a href="/my/release?game=球球大作战">球球大作战</a></dd>
                            <dd data-value="c2f3000001"><a href="/my/release?game=CSOL">CSOL</a></dd>
                            <dd data-value="c2i2000001"><a href="/my/release?game=雨中冒险2">雨中冒险2</a></dd>
                            <dd data-value="26100000h"><a href="/my/release?game=黎明杀机">黎明杀机</a></dd>
                            <dd data-value="c2gh000001"><a href="/my/release?game=生死狙击">生死狙击</a></dd>
                            <dd data-value="c2i2000002"><a href="/my/release?game=方舟：生存进化">方舟：生存进化</a></dd>
                            <dd data-value="c2i4000001"><a href="/my/release?game=盗贼之海">盗贼之海</a></dd>
                            <dd data-value="c2i4000002"><a href="/my/release?game=彩虹6号：围攻">彩虹6号：围攻</a></dd>
                        </dl>
                        <input id="game-id" type="hidden" name="game_id" value="">
                    </div>


                </div>
            </div>
            <h2>
                <span>2</span>
                <span>账号信息</span>
            </h2>
            <div class="form-item-kv middle">
                <label>游戏账号：</label>
                <div class="form-item">
                    <input class="extraInfo-need layui-input" name="account" type="text" placeholder="请输入账号" value=""
                           autocomplete="off">
                </div>
            </div>
            <div class="form-item-kv middle">
                <label>游戏密码：</label>
                <div class="form-item">
                    <input class="extraInfo-need" autocomplete="off" name="password" type="text" placeholder="请输入密码"
                           value="">
                </div>
            </div>


            <h2>
                <span>3</span>
                <span>账号详情</span>
                <span>温馨提示：账号详情越详细，出租率就越高哟！为了您的账号安全，填写账号详情时，请勿填写带有微信号，QQ号，手机等安全隐私的信息！</span>
            </h2>
            <div class="form-item-kv large">
                <label>账号标题：</label>
                <div class="form-item">
                    <input class="words-filter" name="goods_name" value="" type="text" placeholder="请输入账号标题">
                </div>
            </div>
            <div class="form-item-kv large">
                <label>账号描述：</label>
                <div class="form-item">
                    <textarea class="words-filter" name="goods_desc" rows="10" placeholder="请输入账号描述"></textarea>
                </div>
            </div>
            <div class="form-item-kv not-require">
                <label>账号封面：</label>
                <div class="form-item">
                    <div class="file-box">
                        <div class="file-item">
                            <input type="file" name="picture[]" accept="image/jpeg,image/jpg,image/png">
                        </div>

                        <div class="file-item">
                            <input type="file" name="picture[]" accept="image/jpeg,image/jpg,image/png">
                        </div>

                        <div class="file-item">
                            <input type="file" name="picture[]" accept="image/jpeg,image/jpg,image/png">
                        </div>

                        <div class="file-item">
                            <input type="file" name="picture[]" accept="image/jpeg,image/jpg,image/png">
                        </div>

                        <div class="file-item">
                            <input type="file" name="picture[]" accept="image/jpeg,image/jpg,image/png">
                        </div>

                        <div class="previewTem" style="display: none;">
                            <div class="preview-item">
                                <img src="" alt="预览图">
                                <button class="delete-btn">-</button>
                            </div>
                        </div>
                    </div>
                    <p class="tip">上传说明：每张图片大小不超过5M，格式为jpg、jpeg、png</p>
                </div>
            </div>

            <h2>
                <span>4</span>
                <span>出租信息</span>
            </h2>
            <div class="form-item-kv inline middle not-require">
                <label>&emsp; 设置押金：</label>
                <div class="form-item">
                    <label class="pos-after" for="deposit">元</label>
                    <input id="deposit" name="deposit" value="0" type="text" placeholder="押金">
                </div>
            </div>
            <div class="form-item-after">&emsp; * 押金是指用户租用此账号需缴纳的金额，保障交易安全</div>
            <br>
            <div class="form-item-kv inline middle">
                <label>出租单价：</label>
                <div class="form-item">
                    <label class="pos-after" for="hour_price">元/小时</label>
                    <input id="hour_price" name="hour_price" value="" type="text" placeholder="出租单价">
                </div>
            </div>
            <div class="form-item-after">&emsp; * 出租按小时计算</div>
            <br>
            <div class="form-item-kv inline middle">
                <label> 日 租 价：</label>
                <div class="form-item">
                    <label class="pos-after" for="day_price">元</label>
                    <input id="day_price" name="day_price" value="" type="text" placeholder="日租价格">
                </div>
            </div>
            <div class="form-item-after">&emsp; * 日租时长为24小时</div>
            <br>
            <div class="form-item-kv inline middle">
                <label> 包 夜 价：</label>
                <div class="form-item">
                    <label class="pos-after" for="overnight_price">元</label>
                    <input id="overnight_price" name="overnight_price" value="" type="text" placeholder="包夜价格">
                </div>
            </div>
            <div class="form-item-after">&emsp; * 包夜时长为每日的22:00-08:00,单位支持到分</div>
            <br>
            <div class="form-item-kv inline middle">
                <label>最短租时：</label>
                <div class="form-item">
                    <label class="pos-after" for="least_hour">小时</label>
                    <input id="least_hour" name="least_hour" value="1" type="text" placeholder="最短租用时间">
                </div>
            </div>
            <div class="form-item-after">&emsp; * 用户进行租用时，最少的租用时长，只可设置整数（不包含日租、包夜）</div>
            <br>


            <div class="form-item-kv not-require">
                <label><!--提交--></label>
                <div class="form-item">
                    <p class="user-agree">
                        <label class="checkbox">
                            <input id="publish-agree" name="agree" type="checkbox" checked="" value="1">
                            <i></i>
                        </label>
                        <label for="publish-agree">我已阅读并接受<a href="javascript: Zuhao.showPop($('.rules-box'));">《租号网用户协议》</a></label>
                    </p>
                    <button class="main-btn submit">立即发布</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    layui.use(['form','laydate', 'layer'],function () {
        // 复选框
        var form = layui.form;

        form.render();
        //日期
        var laydate = layui.laydate;
        lay('.layui_date').each(function () {
            b = $.extend({elem: this, trigger: 'click'}, a);
            laydate.render(b);
        });
    });

</script>
@include('tpl._include.footer')
