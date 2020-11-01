<?php
/**
 * Created by lzl.
 * Date: 2020 2020/11/1 0001
 * Time: 12:26
 */

namespace App\Http\Controllers;

class MemberController extends Controller
{

    public function index()
    {

        return $this->rView('member.index');
    }
}