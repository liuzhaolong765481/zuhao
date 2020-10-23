<?php
/**
 * Created by lzl
 * Date: 2020 2020/10/9
 * Time: 18:00
 */
namespace App\Http\Controllers;


use App\Utils\Sms;

class IndexController extends Controller
{

    public function index()
    {
        return $this->rView('index');
    }


    /**
     * 404 页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function notFund()
    {
        return view('template.404');
    }

    /**
     * 500 页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function serverError()
    {
        return view('template.500');
    }

}