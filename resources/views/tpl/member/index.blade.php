@include('tpl._include.header')


<div class="w-response breadcrumb">
    <a href="/">租号首页</a>
    <i class="icon icon-crumbs-arrow-big"></i>
    <h1>个人中心</h1>
</div>


<div class="w-response my-center">
    <button class="aside-minor-menu-btn">菜单</button>

    @include('tpl._include.left')

    <div class="main-content index">
        <section class="account">
            <div class="info">
                <div class="avatar ">
                    <img src="{{asset('images/default_icon.png')}}" alt="用户头像">
                    <input id="avatar" type="file" accept="image/jpeg,image/jpg,image/png">
                </div>
                <div>
                    <div class="name">
                        <span>
                            {{auth()->user()->nick_name}}
                            <i class="set-nickname icon icon-edit-name"></i>
                        </span>
                    </div>
                    <div class="money">
                        <div>
                            账户总余额：<strong>￥<span>{{auth()->user()->balance}}</span></strong>
                        </div>
                        &emsp;
                        <div class="explain">
                            可提现资金 <i class="icon icon-explain"></i>：<strong>￥<span>{{auth()->user()->withable_balance }}</span></strong>
                            <div class="hover-pop bottom">
                                <div>
                                    <ul class="items">
                                        <li>可提现资金：账户总余额 - 待退押金 - 其他</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        &emsp;
                        <a href="{{url('member/coupons')}}">
                            红包卡券：<strong><span>0</span>张</strong>
                        </a>
                    </div>
                </div>
                <div class="buttons">
                    <a href="/my/recharge">充值</a>
                    <button class="ghost cash">提现</button>
                </div>
            </div>
            <div class="statistics">
                <a href="{{url('member/order')}}"><span>租号订单</span> <strong>2</strong></a>
                <a href="{{url('member/rentorder')}}"><span>出租订单</span> <strong>0</strong></a>
                <a href="{{url('member/inventory')}}"><span>出租账号</span> <strong>0</strong></a>
                <a href="{{url('member/collection')}}"><span>我的关注</span> <strong>1</strong></a>
                <a href="{{url('member/spreadStatistics')}}"><span>邀请好友</span> <strong>0</strong></a>
            </div>
        </section>

        <section class="rental-order">
            <div class="content-tit">进行中的订单</div>
            <div class="table-wrap">
                <table cellpadding="0" cellspacing="0">
                    <tbody>

                    <tr>
                        <td colspan="999" class="def-none" style="color: #999">
                            <p>这里空空的~您当前还没有正在租用的订单哦~</p>
                            <a href="/lists" style="color: #666">前往下单</a>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>



@include('tpl._include.footer')