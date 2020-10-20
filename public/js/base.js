const SUCCESS = 10001;

const ERROR = 0;

function reload() {
    location.reload();
}

$(document).on('ready', function () {
    /**
     * 图片放大
     */
    $(".enlarge").each(function () {
        $(this).magnificPopup({
            items: {
                src: $(this).attr('src')
            },
            type: 'image' // this is default type
        });
    });
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


