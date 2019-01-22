<?php

namespace App\Http\Controllers\Home\Center;

use App\Address;
use App\Http\Controllers\BaseController;
use App\User;
use Illuminate\Http\Request;

class SettlementController extends BaseController
{
    public function settlement(Request $request)
    {
        $arr        = $request->all();
        $username   = session()->get('username');
        $userid     = User::where("username", $username)->value('id');
        $address    = Address::where("userid", $userid)->where("status", 1)->get();
        $alladdress = Address::where("userid", $userid)->get();
        return view("Home.Center.settlement", ['address' => $address, 'alladdress' => $alladdress]);
    }
}
