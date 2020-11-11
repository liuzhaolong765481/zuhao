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
            <input type="hidden" name="id">
            <h2>
                <span>1</span>
                <span>选择游戏区服</span>
            </h2>
            <div class="form-item-kv inline small">
                <label>选择游戏：</label>
                <div class="form-item">
                    <div class="dropmenu">
                        <select name="game_id" lay-filter="game_select" id="" lay-verify="required" lay-verType="tips">
                            <option value="">请选择游戏</option>
                            @foreach($game as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <!--选择大区-->
            <div class="form-item-kv inline small region_id" style="display: none">
                <label>选择大区：</label>
                <div class="form-item">
                    <div class="dropmenu">
                        <select name="region_id" id=""  lay-filter="region_select" lay-verType="tips">
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-item-kv inline small service_id" style="display: none">
                <label>选择服务器：</label>
                <div class="form-item">
                    <div class="dropmenu">
                        <select name="service_id" lay-filter="service_select" id=""  lay-verType="tips">
                        </select>
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
                    <input class="extraInfo-need layui-input" name="account" type="text" placeholder="请输入账号" value="" autocomplete="off" lay-verify="required" lay-verType="tips">
                </div>
            </div>
            <div class="form-item-kv middle">
                <label>游戏密码：</label>
                <div class="form-item">
                    <input class="extraInfo-need" autocomplete="off" name="password" type="text" placeholder="请输入密码" value="" lay-verify="required" lay-verType="tips">
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
                    <input class="words-filter" name="title" value="" type="text" placeholder="请输入账号标题" lay-verify="required" lay-verType="tips">
                </div>
            </div>
            <div class="form-item-kv large">
                <label>账号描述：</label>
                <div class="form-item">
                    <textarea class="words-filter" name="descript" rows="10" placeholder="请输入账号描述"></textarea>
                </div>
            </div>
            <div class="form-item-kv not-require">
                <label>账号封面：</label>
                <div class="form-item">
                    <div class="file-box">
                        <div class="file-show">
                        </div>
                        <div class="file-item lay-upload">
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

            <div class="form-item-kv inline middle ">
                <label>&emsp; 出租单价：</label>
                <div class="form-item">
                    <label class="pos-after" for="amount">元</label>
                    <input id="deposit" name="amount" value="0" type="text" placeholder="出租单价">
                </div>
            </div>
            <div class="form-item-after">&emsp; * 单价是指账号出租单小时价格</div>
            <br>

            @foreach($specs as $k => $item)
            <div class="form-item-kv inline middle not-require">
                <label> {{$item->specs_name}}：</label>
                <div class="form-item">
                    <label class="pos-after" for="day_price">元</label>
                    <input id="day_price" name="specs[{{$item->id}}]" value="" type="number" placeholder="{{$item->specs_name}}价格">
                </div>
            </div>
            <br>
            @endforeach

            <div class="form-item-kv not-require">
                <label><!--提交--></label>
                <div class="form-item">
                    <p class="user-agree">
                        <label class="checkbox">
                            <input id="publish-agree" lay-skin="primary" name="agree" type="checkbox" checked value="1">
                        </label>
                        <label for="publish-agree">我已阅读并接受<a href="" target="_blank">《租号网用户协议》</a></label>
                    </p>
                    <button lay-submit lay-filter="account_add" type="button" class="main-btn submit">立即发布</button>
                </div>
            </div>

        </form>
    </div>
</div>

<script>

    erLarge();

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

        form.on('select(game_select)', function(data) {

            $.ajax({
                type:"post",
                url:"{{url('public/get-game-spu')}}",
                data:{game_id:data.value},
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function (res) {
                    $("select[name='region_id']").empty();

                    if (res.status == SUCCESS) {
                        $('.region_id').css('display', 'inline-block');
                        $("select[name='region_id']").append(new Option("请选择大区", ""));
                        $.each(res.data, function (index, item) {
                            $("select[name='region_id']").append(new Option(item.region_name, item.id));
                        });
                        form.render("select");
                    }else{
                        $('.region_id').css('display', 'none');
                        $('.service_id').css('display', 'none');
                    }

                },
            })

        });

        form.on('select(region_select)', function(data) {

            $.ajax({
                type:"post",
                url:"{{url('public/get-game-spu')}}",
                data:{region_id:data.value},
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function (res) {
                    $("select[name='service_id']").empty();

                    if (res.status == SUCCESS) {
                        $('.service_id').css('display', 'inline-block');
                        $("select[name='service_id']").append(new Option("请选择服务器", ""));
                        $.each(res.data, function (index, item) {
                            $("select[name='service_id']").append(new Option(item.service_name, item.id));
                        });

                        form.render("select");
                    }else{
                        $('.service_id').css('display', 'none');
                    }

                },
            })

        });

        upload($('.lay-upload'), "{{url('public/upload')}}", uploadCall);

        function uploadCall(res) {
            var count = $('.file-show div').length;
            if(count > 4){
                layer.msg('最多允许上传5张图片');
                return false;
            }
            $('.file-show').append("<div><img src='"+res.data +"' class='enlarge' alt='' title='点击放大查看'><em class='file-close'></em><input  name='images[]' value='"+res.data+"' type='hidden'></div>");
            erLarge();
        }

        form.on('submit(account_add)', function(data) {
            console.log(data.field);
            ajaxRequest("{{url('account/publish')}}", publishCall, data.field);

        });

        function publishCall() {
            layer.msg('发布成功，等待后台管理员审核',function () {
                location.href = '/';
            })
        }
    });
    $(document).on("click", ".file-close", function(){
        $(this).parent().remove();
    });

</script>
@include('tpl._include.footer')
