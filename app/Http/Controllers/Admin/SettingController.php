<?php
/**
 * Created by lzl.
 * Date: 2020 2020/10/22 0022
 * Time: 21:53
 */
namespace App\Http\Controllers\Admin;

use App\Models\Setting;

class SettingController extends Controller
{

    public function index()
    {
        $farther = Setting::where('pid', Setting::FARTHER)->get()->toArray();

        foreach ($farther as &$item){
            $item['list'] = Setting::where('pid', $item['id'])->get();
        }

        if($this->request->isMethod('post')) {

        }

        return $this->rView('setting.index', compact('farther'));
    }



}