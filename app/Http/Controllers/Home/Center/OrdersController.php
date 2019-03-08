<?php
namespace App\Http\Controllers\Home\Center;

use App\Http\Controllers\BaseController;
use App\Orders;
use Illuminate\Http\Request;

class OrdersController extends BaseController
{
    public function orders()
    {
        return view("Home.Center.orders");
    }
    public function saveOrderss(Request $request)
    {
        $all = $request->all();
        unset($all['_token']);
        $address    = $all['address'];
        $totalAmout = $all['total_amount'];
        dd(totalAmount);
        $userid      = session()->get('centeruserid');
        $orderNumber = Orders::findAvailableNo();
        date_default_timezone_set("PRC");
        $order_at = date('Y-m-d h:i:s', time());
        $Orders   = new Orders([
            'order_number' => $orderNumber,
            'userid'       => $userid,
            'address'      => $address,
            'total_amount' => $totalAmount,
            'order_at'     => $order_at,
        ]);
        $re        = $Orders->save();
        $message   = $re ? "添加成功" : "添加失败";
        $returnArr = [
            'result' => $re ? 'success' : 'error',
            'msg'    => $message,
            'data'   => null,
        ];
        echo json_encode($returnArr);
    }
}
