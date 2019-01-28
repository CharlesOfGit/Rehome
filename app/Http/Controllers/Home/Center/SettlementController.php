<?php

namespace App\Http\Controllers\Home\Center;

use App\Address;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class SettlementController extends BaseController
{
    public function settlement(Request $request)
    {
        $arr        = $request->all();
        $userid     = session()->get('centeruserid');
        $address    = Address::where("userid", $userid)->where("status", 1)->get();
        $alladdress = Address::where("userid", $userid)->get();
        return view("Home.Center.settlement", ['address' => $address, 'alladdress' => $alladdress]);
    }
    public function setAddress(Request $request)
    {
        $addressid = $request->input('id');
        Address::where('userid', session()->get('centeruserid'))->update(['status' => 0]);
        $re = Address::where('id', $addressid)->update(['status' => 1]);
        if ($re) {
            $response = array(
                'errno'  => 1,
                'errmsg' => 'success',
                'data'   => true,
            );
        } else {
            $response = array(
                'errno'  => -1,
                'errmsg' => 'fail',
                'data'   => false,
            );
        }
        echo json_encode($response);
    }
}
