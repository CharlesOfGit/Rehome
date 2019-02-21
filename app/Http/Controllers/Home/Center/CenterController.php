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
    public function message()
    {
        return view("Home.Center.message");
    }
}
