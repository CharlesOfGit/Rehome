<?php

namespace App\Http\Controllers\Home\Center;

use App\Address;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettlementController extends BaseController
{
    public function settlement(Request $request)
    {
        $cartsid        = array_values($request->except('_token'));
        $userid         = session()->get('centeruserid');
        $address        = Address::where("userid", $userid)->where("status", 1)->get();
        $alladdress     = Address::where("userid", $userid)->get();
        $settlementList = DB::table('cart')
            ->join('product', 'cart.productid', '=', 'product.id')
            ->join('productimage', 'cart.productid', '=', 'productimage.productid')
            ->select('cart.price', 'cart.productid', 'product.title', 'productimage.path', 'cart.buynum')
            ->where('userid', $userid)
            ->whereIn('cart.id', $cartsid)
            ->get();
        $total = 0;
        return view("Home.Center.settlement", ['address' => $address, 'alladdress' => $alladdress, 'settlementList' => $settlementList, 'total' => $total]);
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
