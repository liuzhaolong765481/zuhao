@include('admin._include.header')

<body>
<div class="layui-fluid">
    <div class="layui-card">


        <div class="layui-card-body">

            <table lay-filter="article" class="layui-table" lay-data="{height:'full-155',cellMinWidth:95,url:'{{url('admin/auth/user-list')}}', page:true, id:'article'}">
                <tr>
                    <input type="number" name="tel" id="tel" value="" class="layui-input" style="width: 20%;float: left" placeholder="请输入会员手机号"/>
                    <button style="margin-left: 2%" class="layui-btn" id="search" >查询</button>
                </tr>
                <thead>
                <tr>
                    <th lay-data="{field:'id', align:'center'}">ID</th>
                    <th lay-data="{field:'user_phone',align:'center'}">手机号</th>
                    <th lay-data="{field:'nick_name',align:'center'}">昵称</th>
                    <th lay-data="{field:'email',align:'center'}">邮箱</th>
                    <th lay-data="{field:'register_time',align:'center'}">注册时间</th>
                    <th lay-data="{field:'balance',align:'center'}">账户总金额</th>
                    <th lay-data="{field:'withable_balance',align:'center'}">可提现金额</th>
                    <th lay-data="{field:'deposit',align:'center'}">押金</th>
                    {{--<th lay-data="{field:'ali_number',align:'center'}">支付宝</th>--}}
                    {{--<th lay-data="{field:'real_name',align:'center'}">真实姓名</th>--}}
                    {{--<th lay-data="{field:'idcard',align:'center'}">身份证号</th>--}}

                    <th lay-data="{align:'center',templet:'#user_status'}">是否禁用</th>
                    <th lay-data="{width:140,title:'操作',templet:'#listBar',align:'center'}">操作</th>
                </tr>
                </thead>
            </table>

        </div>
    </div>
</div>

<script type="text/html" id="user_status">
    @{{# if (d.user_status == 1) { }}
    <input type="checkbox" checked="true" lay-filter="master" value="@{{d.id}}" lay-skin="switch" lay-text="是|否">
    @{{# } else {}}
    <input type="checkbox"  value="@{{d.id}}" lay-filter="master" lay-skin="switch" lay-text="是|否">
    @{{# }}}
</script>

<script type="text/html" id="listBar">
    <a class="layui-btn layui-btn-xs"  data-url="{{url('auth/user-info')}}?id=@{{ d.id }}" lay-event="edit">详情</a>
    <a class="layui-btn layui-btn-xs layui-btn-normal" data-url="{{url('auth/user-recharge')}}?id=@{{ d.id }}" lay-event="look">充值</a>
</script>

<script>
    layui.config({
        base: "/plugin/layuiadmin/"  //静态资源所在路径
    }).extend({
        index: 'lib/index' //主入口模块
    }).use(['index', 'table'], function(){
        var $ = layui.$
            ,form = layui.form
            ,table = layui.table;


        form.on('switch(master)', function(data){
            var bool = data.elem.checked;
            var id = data.value;
            if (bool) {
                var status = "1";
            } else {
                var status = "0";
            }
            var index = layer.load(1);
            var url = "{:url('index/change')}";
            $.post(url,{model:'user',id:id,field:"ismaster",value:status},function () {
                layer.close(index);
                layer.msg("操作成功",{time:800,shade:0.3},function () {
                    table.reload('article')
                });
            },"json")
        });


    });
</script>
</body>

@include('admin._include.footer')