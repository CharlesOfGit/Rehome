<?php

namespace App\Http\Controllers\Home\Center;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class SettlementController extends BaseController
{
    public function settlement(Request $request)
    {
        $arr = $request->all();
        dd($arr);
        return view("Home.Center.settlement");
    }
}
