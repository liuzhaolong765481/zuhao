<?php
/**
 * Created by lzl
 * Date: 2020 2020/10/10
 * Time: 16:43
 */

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UploadServices as Upload;
use App\Utils\Sms;

class PublicController extends Controller
{

    /**
     * 发送短信
     * @return mixed
     * @throws \App\Exceptions\RequestException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function sendSms()
    {
        $rules = [
            'user_phone' => [
                'required',
                'regex:/^((13[0-9])|(14[5,7])|(15[0-3,5-9])|(17[0,3,5-8])|(18[0-9])|166|198|199|(147))\d{8}$/',
                'exists:' . (new User())->getTable()
            ],
            'type'   => 'required|in:register,code',
        ];

        $this->validateInput($rules);

        return $this->successOrFailed(Sms::send($this->validated['user_phone'], $this->validated['type']));
    }


    /**
     * 单个文件上传
     * @return string
     * @throws \App\Exceptions\RequestException
     */
    public function upload()
    {
        $rules = [
            'file' => 'required|file|max:102400',
        ];

        $this->validateInput($rules);

        return $this->success(Upload::upload($this->validated['file']));
    }


    /**
     * 批量上传
     * @return mixed
     * @throws \App\Exceptions\RequestException
     */
    public function uploads()
    {

        $rules = [
            'files' => 'required|array',
            'files.*' => 'required|file|max:102400',
        ];

        $this->validateInput($rules);

        return $this->success(Upload::uploads($this->validated['files']));
    }

}