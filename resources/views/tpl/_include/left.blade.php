<link rel="stylesheet" href="{{asset('css/member.css')}}">

<script>
    $(function () {
        var url = "{{Request::url()}}";
        $(".aside-minor-menu a").each(function (index, element) {
            if($(this).attr('href') === url){
                $(this).attr('class','on')
            }
        })
    });
</script>
<ul class="aside-minor-menu">
    <li class="has-sub show-sub">
        <a  href="/my">个人中心</a>
    </li>
    <li class="has-sub show-sub">
        <a>我的租号</a>
        <div>
            <a class="" href="/my/order">我的租号订单</a>
            <a class="" href="/my/collection">我的关注</a>
        </div>
    </li>

    <li class="has-sub show-sub">
        <a>我是号主</a>
        <div>
            <a class="" href="/my/rentOrder">我的出租订单</a>
            <a class="" href="/my/inventory">我的出租帐号</a>
            <a class="" href="{{url('member/publish')}}">发布帐号</a>
        </div>
    </li>
    <li class="has-sub show-sub">
        <a>我的资产</a>
        <div>
            <a class="" href="/my/moneyStatistics">资金概况</a>
            <a class="" href="/my/moneyDetail">资金明细</a>
            <a class="" href="/my/coupons">红包卡券</a>
        </div>
    </li>
    {{--<li class="has-sub show-sub">--}}
    {{--<a>租号推广</a>--}}
    {{--<div>--}}
    {{--<a class="" href="/my/spreadStatistics">数据概况</a>--}}
    {{--<a class="" href="/my/spreadManage">推广管理</a>--}}
    {{--<a class="" href="/my/spreadOrders">订单明细</a>--}}
    {{--<a class="" href="/my/spreadChannels">推广代理数据报表</a>--}}
    {{--<a class="" href="/my/spreadChannelDetail">代理详情数据</a>--}}
    {{--</div>--}}
    {{--</li>--}}
    <li class="has-sub show-sub">
        <a>账户管理</a>
        <div>
            <a class="" href="/my/safe">账户设置</a>
            <a class="" href="/my/msg">我的消息</a>
        </div>
    </li>
</ul>
