<?php

namespace App\Http\Controllers\Home\Center;

use App\Address;
use App\Cart;
use App\Http\Controllers\BaseController;
use App\Orders;
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
            ->select('cart.price', 'cart.productid', 'product.title', 'productimage.path', 'cart.buynum', 'cart.id')
            ->where('userid', $userid)
            ->whereIn('cart.id', $cartsid)
            ->get();
        $total      = 0;
        $StrCartsid = implode(',', $cartsid);
        return view("Home.Center.settlement", ['address' => $address, 'alladdress' => $alladdress, 'settlementList' => $settlementList, 'total' => $total, 'StrCartsid' => $StrCartsid]);
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
    public function saveOrderss(Request $request)
    {
        $all = $request->all();
        unset($all['_token']);
        $address     = $all['address'];
        $totalAmount = $all['total_amount'];
        $userid      = session()->get('centeruserid');
        $orderNumber = Orders::findAvailableNo();
        date_default_timezone_set("PRC");
        $order_at = date('Y-m-d h:i:s', time());

        // $Orders = new Orders([
        //     'order_number' => $orderNumber,
        //     'userid'       => $userid,
        //     'address'      => $address,
        //     'total_amount' => $totalAmount,
        //     'order_at'     => $order_at,
        // ]);
        // $re       = $Orders->save();

        // $Oedersid = $Orders->id;
        $cartsid = explode(',', $all['cartsid']);
        foreach ($cartsid as $value) {
            $sku = Cart::find($value);
            var_dump($sku);
            exit();
        }

        $message   = $re ? "添加成功" : "添加失败";
        $returnArr = [
            'result' => $re ? 'success' : 'error',
            'msg'    => $message,
            'data'   => null,
        ];
        echo json_encode($returnArr);
    }

}
