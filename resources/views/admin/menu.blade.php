<div class="layui-side layui-side-menu">
    <div class="layui-side-scroll">
        <div class="layui-logo" lay-href="home/console.html">
            <span>飞讯租号</span>
        </div>

        <ul class="layui-nav layui-nav-tree" lay-shrink="all" id="LAY-system-side-menu" lay-filter="layadmin-system-side-menu">
            <li data-name="home" class="layui-nav-item">
                <a href="javascript:;" lay-href="{{asset('admin/index/console')}}" lay-tips="主页" lay-direction="2">
                    <i class="layui-icon layui-icon-home"></i>
                    <cite>控制台</cite>
                </a>
            </li>

            <li data-name="app" class="layui-nav-item">
                <a href="javascript:;" lay-tips="应用" lay-direction="2">
                    <i class="layui-icon layui-icon-app"></i>
                    <cite>应用</cite>
                </a>
                <dl class="layui-nav-child">

                    <dd data-name="content">
                        <a href="javascript:;">内容系统</a>
                        <dl class="layui-nav-child">
                            <dd data-name="list"><a lay-href="app/content/list.html">文章列表</a></dd>
                            <dd data-name="tags"><a lay-href="app/content/tags.html">分类管理</a></dd>
                            <dd data-name="comment"><a lay-href="app/content/comment.html">评论管理</a></dd>
                        </dl>
                    </dd>
                    <dd data-name="forum">
                        <a href="javascript:;">社区系统</a>
                        <dl class="layui-nav-child">
                            <dd data-name="list"><a lay-href="app/forum/list.html">帖子列表</a></dd>
                            <dd data-name="replys"><a lay-href="app/forum/replys.html">回帖列表</a></dd>
                        </dl>
                    </dd>
                    <dd>
                        <a lay-href="app/message/index.html">消息中心</a>
                    </dd>
                    <dd data-name="workorder">
                        <a lay-href="app/workorder/list.html">工单系统</a>
                    </dd>
                </dl>
            </li>

            <li data-name="user" class="layui-nav-item">
                <a href="javascript:;" lay-tips="用户" lay-direction="2">
                    <i class="layui-icon layui-icon-user"></i>
                    <cite>用户</cite>
                </a>
                <dl class="layui-nav-child">
                    <dd>
                        <a lay-href="{{url('admin/auth/user-list')}}">网站用户</a>
                    </dd>
                    <dd>
                        <a lay-href="{{url('admin/auth/manager-list')}}">后台管理员</a>
                    </dd>
                </dl>
            </li>

            <li data-name="set" class="layui-nav-item">
                <a href="javascript:;" lay-tips="设置" lay-direction="2">
                    <i class="layui-icon layui-icon-set"></i>
                    <cite>设置</cite>
                </a>
                <dl class="layui-nav-child">
                    <dd class="layui-nav-itemed">
                        <a href="javascript:;">系统设置</a>
                        <dl class="layui-nav-child">
                            <dd><a lay-href="set/system/website.html">网站设置</a></dd>
                            <dd><a lay-href="set/system/email.html">邮件服务</a></dd>
                        </dl>
                    </dd>
                    <dd class="layui-nav-itemed">
                        <a href="javascript:;">我的设置</a>
                        <dl class="layui-nav-child">
                            <dd><a lay-href="set/user/info.html">基本资料</a></dd>
                            <dd><a lay-href="set/user/password.html">修改密码</a></dd>
                        </dl>
                    </dd>
                </dl>
            </li>

        </ul>
    </div>
</div>