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
            ->join('address', 'orders.addressid', '=', 'address.id')
            ->join('order_items', 'order_items.orderid', '=', 'orders.id')
            ->join('product', 'product.id', '=', 'order_items.productid')
            ->join('productimage', 'product.id', '=', 'productimage.productid')
            ->select('address.consignee', 'address.address', 'address.mobile', 'address.address', 'productimage.path', 'order_items.buynum', 'product.title', 'product.price', 'orders.order_number', 'orders.total_amonut', 'orders.order_at')
            ->where('orders.userid', $userid)
            ->get();
        // dd($OrderItemsList);
        return view("Home.Center.orders", ['OrderItemsList' => $OrderItemsList]);
    }

}
