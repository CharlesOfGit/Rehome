<?php
namespace App\Http\Controllers\Home\Center;

use App\Http\Controllers\BaseController;

/**
 *
 */
class CenterController extends BaseController
{
    public function message()
    {
        return view("Home.Center.message");
    }
}
