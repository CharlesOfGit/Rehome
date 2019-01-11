<?php
namespace App\Http\Controllers\Home\Center;

use App\Http\Controllers\BaseController;

/**
 *
 */
class CenterController extends BaseController
{

    public function dingdan()
    {
        return view("Home.Center.dingdan");
    }
    public function shoucang()
    {
        return view("Home.Center.shoucang");
    }
    public function message()
    {
        return view("Home.Center.message");
    }
}
