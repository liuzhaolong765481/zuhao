<?php
/**
 * Created by lzl
 * Date: 2020 2020/10/9
 * Time: 17:59
 */
namespace App\Http\Controllers\Admin;

use App\Models\Ad;
use App\Models\GameRegion;

class IndexController extends Controller
{

    public function home()
    {
        return $this->rView('home');
    }

    public function console()
    {
        return $this->rView('console');
    }


}