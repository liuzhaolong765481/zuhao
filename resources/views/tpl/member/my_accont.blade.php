@include('tpl._include.header')

<div class="w-response breadcrumb">
    <a href="/">租号首页</a>
    <i class="icon icon-crumbs-arrow-big"></i>
    <h1>个人中心</h1>
</div>

<div class="w-response my-center">
    <button class="aside-minor-menu-btn">菜单</button>
    @include('tpl._include.left')
    <div class="main-content goods-manage">
        <section>
            <div class="content-tit">我的出租账号</div>
            <ul class="filterSort-box cf">
                <li class="search inventory_search">
                    <input type="text" placeholder="请输入商品标题/编号进行搜索">
                    <button>查询</button>
                </li>
            </ul>
            <ul class="switch-head minor">
                <li class="on"><a href="/my/inventory">全部账号</a>
                </li>
                <li class=""><a href="/my/inventory?tab=rent_able">可租用</a></li>
                <li class=""><a href="/my/inventory?tab=off_shelf">已下架</a></li>
                <li class=""><a href="/my/inventory?tab=rental">出租中</a></li>

            </ul>
            <div class="content-wrap">
                <div class="table-wrap">
                    <table cellpadding="0" cellspacing="0">
                        <thead>
                        <tr>
                            <th>账号信息</th>
                            <th class="center">单价</th>
                            <th class="center">出租总时长</th>
                            <th class="center">押金</th>
                            <th class="center">状态</th>
                            <th class="center">操作</th>
                        </tr>
                        </thead>
                        <tbody class="js-mainContent"></tbody>
                    </table>
                </div>
                <ul class="pagination"></ul>

            </div>
        </section>
    </div>
</div>




@include('tpl._include.footer')