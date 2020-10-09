<?php

/**
 * 获取当前控制器名
 *
 * @return string
 */
function getCurrentControllerName()
{
    $str = getCurrentAction()['controller'];
    $array = explode("\\", $str);
    return $array[count($array)-1];
}

/**
 * 获取当前方法名
 *
 * @return string
 */
function getCurrentMethodName()
{
    return getCurrentAction()['method'];
}

/**
 * 获取当前控制器与方法
 *
 * @return array
 */
function getCurrentAction()
{
    $action = \Route::current()->getActionName();
    list($class, $method) = explode('@', $action);
    return ['controller' => $class, 'method' => $method];
}

/**
 * 密码加密方式
 * @param $psd
 * @return string
 */
function encrypt_psd($psd)
{
    return md5($psd);
}

/**
 * 判断数组是否为 关联数组
 * @param $array
 * @return bool
 */
function is_assoc($array)
{
    return array_keys($array) !== range(0, count($array));
}


/**
 * 大写日期转小写
 * @param $chinaNUm
 * @return false|string
 */
function china_to_number($chinaNUm)
{
    $arr = [
        0 => '零',
        1 => '壹',
        2 => '贰',
        3 => '叁',
        4 => '肆',
        5 => '伍',
        6 => '陆',
        7 => '柒',
        8 => '捌',
        9 => '玖',
    ];


    if (intval($chinaNUm) > 0) {
        $num = str_replace('-', '', $chinaNUm);
    } else {
        $charArr = array_intersect(mb_to_array($chinaNUm), $arr);

        $num = '';
        foreach ($charArr as $v) {
            $num .= array_search($v, $arr);
        }
    }

    return date('Y-m-d', strtotime($num));
}

/**
 * 将每个中文字符切割为数组
 * @param $char
 * @return array
 */
function mb_to_array($char)
{
    $length = mb_strlen($char, 'utf-8');
    $array = [];
    for ($i=0; $i<$length; $i++) {
        $array[] = mb_substr($char, $i, 1, 'utf-8');
    }

    return $array;
}

/**
 * 生成16位uuid
 * 有日期标记
 * @param int $len 追加长度
 * @return string
 */
function get_uuid($len = 0)
{
    $int = '';

    while (strlen($int) != $len) {
        $int .= mt_rand(0, 9);
    }

    return date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8) . $int;
}

/**
 * 生成12位订单id
 * @param string $prefix
 * @return string
 */
function get_order_no($prefix = '')
{
    list($s1, $s2) = explode(' ', microtime());
    return $prefix . substr(date("Ymdis"), 2) . substr(sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000), -2);
}

/**
 * 将字符串
 * @param $str
 * @param $start
 * @param $len
 * @return mixed
 */
function add_mosaic($str, $start, $len)
{
    $modify = '*';

    while (strlen($modify) != $len) {
        $modify .= '*';
    }

    return substr_replace($str, $modify, $start, $len);
}



function is_ssl($str, $resize = false)
{
    $str = (Str::startsWith(url('/'), 'http://') ? 'http://' : 'https://') . $str;
    return $str .= $resize ? '?x-oss-process=image/resize,w_300' : '';
}

function get_city($address, $type = false)
{
    $province = $city = $area = null;

    preg_match('/(.*?(省|自治区|北京市|天津市))/', $address, $matches);
    if (count($matches) > 1) {
        $province = $matches[count($matches) - 2];
        $address = str_replace($province, '', $address);
    }
    preg_match('/(.*?(市|自治州|地区|区划|县))/', $address, $matches);
    if (count($matches) > 1) {
        $city = $matches[count($matches) - 2];
        $address = str_replace($city, '', $address);
    }
    preg_match('/(.*?(区|县|镇|乡|街道))/', $address, $matches);
    if (count($matches) > 1) {
        $area = $matches[count($matches) - 2];
    }

    if ($type) {
        ($a = $province) || ($a = $city) || ($a = $area) || ($a = '北京市');

        return $a;
    }

    return [
        'province' => isset($province) ? $province : '',
        'city' => isset($city) ? $city : '',
        'area' => isset($area) ? $area : '',
        ];
}


function view_display($bool)
{
    return $bool ? 'display: block' : 'display: none;';
}

function view_none($bool)
{
    return view_display(blank($bool));
}

/**
 * 格式化金额
 * @param $amount   int 金额(单位分)
 * @param int $type 0 转为元 1 转为万元 2 转为千万 3 转为亿
 * @return float|int
 */
function format_amount($amount, $type = 0, $status = true)
{
    if (blank($amount)) {
        return 0;
    }

    switch ($type) {
        case 0 :
            $prefix = '';
            break;
        case 1 :
            $amount /= 10000;
            $prefix = '万';
            break;
        case 2 :
            $amount /= 10000000;
            $prefix = '千万';
            break;
        case 3 :
            $amount /= 100000000;
            $prefix = '亿';
            break;
        default :
            break;
    }

    return $status ? number_format($amount / 100, 2) . $prefix : number_format($amount, 2) . $prefix;
}


function img_base64($url)
{
    return (pathinfo($url, PATHINFO_EXTENSION) == 'jpg' ? 'data:image/jpeg;base64,' : 'data:image/png;base64,')
        . base64_encode(file_get_contents('http://' . $url . '?x-oss-process=image/quality,q_10'));
}

function img_tips($format, $size)
{
    return '支持' . $format . '格式' . '，最大支持'. $size .'MB';
}


function get_hash()
{
    $chars   = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()+-';
    $random  = $chars[mt_rand(0, 73)] . $chars[mt_rand(0, 73)] . $chars[mt_rand(0, 73)] . $chars[mt_rand(0, 73)] . $chars[mt_rand(0, 73)];
    $content = uniqid() . $random;
    return sha1($content);
}


function starts_with($str, $pattern)
{
    return strpos($str, $pattern) === 0 ? true : false ;
}