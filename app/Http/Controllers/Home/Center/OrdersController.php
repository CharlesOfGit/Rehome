<?php
namespace App\Http\Controllers\Home\Center;

use App\Http\Controllers\BaseController;
use App\Orders;
use Illuminate\Support\Facades\DB;

class OrdersController extends BaseController
{
    public function orders()
    {
        $userid         = session()->get('centeruserid');
        $OrderItemsList = DB::table('orders')
            ->join('order_items', 'orders.id', '=', 'order_items.orderid')
            ->select('orders.id', 'orders.order_number', 'orders.userid', 'orders.order_at', 'order_items.productid', 'order_items.buynum', 'order_items.price', 'order_items.id')
            ->where('orders.userid', $userid)
            ->get();
        dd($OrderItemsList);
        return view("Home.Center.orders");
    }

}
