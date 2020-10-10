<?php


namespace App\Services;


use App\Exceptions\RequestException;

/**
 * Class UploadServices
 * 上传相关
 * @package App\Services
 */
class UploadServices
{
    const BASE_PATH = '/uploads';

    /**
     * 图片上传
     * @param $file \Illuminate\Http\UploadedFile 用户上传文件
     * @param $dir string string 存储路径
     * @return string
     * @throws RequestException
     */
    public static function upload($file)
    {
        // 获取文件相关信息
        $ext = $file->getClientOriginalExtension();     // 扩展名
        $realPath = $file->getRealPath();   //临时文件的绝对路径

        // 上传文件路径文件
        $filename = self::BASE_PATH. '/' . date('Ymd') . '/' . \Str::Random(32) . '.' . $ext;

        // 上传
        if (\Storage::put($filename, file_get_contents($realPath))) {
            return  $filename;
        }

        throw new RequestException(trans('message.file.error'));
    }

    /**
     * 批量上传
     * @param array $files 用户上传图片集
     * @param $dir string 存储路径
     * @return mixed
     * @throws RequestException
     */
    public static function uploads(array $files)
    {
        // 循环上传 debug 后期可修改批量上传 该方法当前为多次请求
        foreach ($files as $key => $value) {
            $arr[$key] = self::upload($value);
        }

        // 返回路径地址
        return $arr;
    }

    /**
     * 流上传
     * @param $stream
     * @return string
     * @throws RequestException
     */
    public static function uploadStream($stream)
    {
        // 上传文件路径文件
        $filename = self::BASE_PATH . '/' . date('Ymd') . '/' . \Str::Random(32) . '.jpg';

        // 上传
        if (\Storage::put($filename, $stream)) {
            return  $filename;
        }

        throw new RequestException(trans('message.file.error'));
    }
}
