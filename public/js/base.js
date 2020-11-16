const SUCCESS = 10001;

const AUTH_ERROR = 10002;

const NO_DATA = 10003;

const ERROR = 0;

function reload() {
    location.reload();
}

$(document).on('ready', function () {
    erLarge();
});

/**
 * 封装加载层
 */
function loading() {
    return layer.load(2, {
        shade: [0.6, '#fff'], content: '请稍后...', success: function (layero) {
            layero.find('.layui-layer-content').css({
                'padding-top': '6px',
                'width': '150px',
                'padding-left': '40px'
            });
            layero.find('.layui-layer-ico16, .layui-layer-loading .layui-layer-loading2').css({
                'width': '150px !important',
                'background-position': '2px 0 !important'
            });
        }
    });
}

/**
 * 刷新验证码
 */
function refreshCode() {
    str = $('.verify-code').attr('src');
    if(str!="undefined" && str!=null){
        begin = str.indexOf('&');
        if (begin !== -1) {
            str = str.substring(begin, -1);
        }
        $('.verify-code').attr('src', str + '&r=' + Math.ceil(Math.random() * 100));
    }
}

/**
 * 图片放大
 */
function erLarge() {
   
    $(".enlarge").each(function () {
        $(this).magnificPopup({
            items: {
                src: $(this).attr('src')
            },
            type: 'image' // this is default type
        });
    });
}

/**
 * 无按钮弹框
 * @param element
 */
function mask(element) {
    layui.use('layer', function(){
        layer.open({
            type: 1,
            title: false,
            closeBtn: 2,
            shadeClose: true,
            content: element
        });
    });

}

/**
 * 封装ajax 需要先声明layer
 * @param url
 * @param callback
 * @param param
 */
function ajaxRequest(url,  callback, param = {}, ) {
    var load;
    $.ajax({
        type:"post",
        url:url,
        data:param,
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend:function () {

            load =  layer.load(2, {
                shade: [0.6, '#fff'], content: '请稍后...', success: function (layero) {
                    layero.find('.layui-layer-content').css({
                        'padding-top': '6px',
                        'width': '150px',
                        'padding-left': '40px'
                    });
                    layero.find('.layui-layer-ico16, .layui-layer-loading .layui-layer-loading2').css({
                        'width': '150px !important',
                        'background-position': '2px 0 !important'
                    });
                }
            });

        },
        success:function (res) {
            layer.close(load);
            if(res.status === SUCCESS){
                callback(res);
            }else if(res.status === AUTH_ERROR){
                layer.msg('请先登录',function () {
                    mask($('.login-box'));
                },1000)
            }else{
                layer.msg(res.message)
            }

        },
        error:function () {
            layer.close(load);
        }


    })
}



/**
 * 封装ajax 需要先声明layer
 * @param url
 * @param callback
 * @param param
 */
function ajaxNoLoading(url,  callback, param = {}, ) {
    $.ajax({
        type:"post",
        url:url,
        data:param,
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function (res) {
            if(res.status == SUCCESS || res.status == NO_DATA){
                callback(res);
            }else if(res.status === AUTH_ERROR){
                layer.msg('请先登录',function () {
                    $('.to-login').click();
                })
            }

        },
    })
}

function showSuccess(res) {
    layer.msg(res.message);
}

/**
 * 正则验证手机号
 * @param phone
 * @returns {boolean}
 */
function isPhone(phone) {
    var pattern = /^((13[0-9])|(14[5,7])|(15[0-3,5-9])|(17[0,3,5-8])|(18[0-9])|166|198|199|(147))\d{8}$/;
    return pattern.test(phone);
}

var countdown=60;
function setTime(obj) {
    if (countdown === 0) {
        obj.removeAttr("disabled");
        obj.css('background','#F7CD46');
        obj.css('border','#F7CD46');
        obj.text('获取验证码');
        countdown = 60;
        return;
    } else {
        obj.attr("disabled", "disabled");
        obj.css('background','#ddd');
        obj.css('border','#ddd');
        obj.text("重新发送(" + countdown + ")");
        countdown--;
    }
    setTimeout(function() {
            setTime(obj) }
        ,1000)
}

/**
 * 拼接图片地址
 * @param str
 * @returns {*}
 */
function is_ssl(str) {
    return str;
}

/**
 * 处理上传图片/文件（单图）
 * @param element
 * @param url
 * @param callback
 * @param suffix
 * @param param
 */
function upload(element, url, callback, param = {}, suffix = 'image/*' ) {
    var load;
    layui.use('upload', function () {

        var upload = layui.upload;

        upload.render({
            elem:element, //绑定元素
            url: url, //上传接口
            multiple: false,  //是否允许多图上传
            accept: 'file',  //指定允许上传时校验的文件类型，可选值有：images（图片）、file（所有文件）、video（视频）、audio（音频）
            before: function () {
                load = loading()
            },
            acceptMime: suffix, //打开文件类型
            field: 'file',  //上传文件参数名
            data:param,
            exts:'.*',  //允许上传文件后缀名
            done: function (res) {
                if(res.status == SUCCESS){
                    layer.close(load);
                    callback(res);
                }else{
                    layer.msg(res.message);
                    layer.close(load);
                }

            },
            error: function (res) {
                layer.close(load);
            }
        });
    });

}