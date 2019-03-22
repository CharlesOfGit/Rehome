<?php
namespace App\Http\Controllers\Home\Center;

use App\Http\Controllers\BaseController;
use App\Orders;
use Illuminate\Support\Facades\DB;

class OrdersController extends BaseController
{
    public function orders()
    {
        $userid = session()->get('centeruserid');

        $OrderItemsInfoArr = [];
        $OrderItemsListArr = [];

        $OrderIDs = DB::table('orders')->where('orders.userid', $userid)->pluck('id');

        foreach ($OrderIDs as $value) {
            $OrderItemsList = DB::table('order_items')
                ->select('order_items.id')
                ->where('order_items.orderid', $value)
                ->get();
            // dd($OrderItemsList);
            foreach ($OrderItemsList as $key) {
                $OrderItemsInfo = DB::table('order_items')
                    ->join('product', 'product.id', '=', 'order_items.productid')
                    ->join('productimage', 'product.id', '=', 'productimage.productid')
                    ->select('productimage.path', 'order_items.buynum', 'product.title', 'product.price', 'orders.order_number', 'orders.order_at')
                    ->where('order_items.id', $key->id)
                //->where('order_items.orderid', $value)
                    ->get();
                // dd($OrderItemsInfo);
                //exit();
                $OrderItemsInfoArr[$key->id] = reset($OrderItemsInfo);
            }

            $OrderItemsListArr[$value] = $OrderItemsInfoArr;
            unset($OrderItemsInfoArr);
        }
        // dd($OrderItemsListArr);
        return view("Home.Center.orders", ['OrderItemsListArr' => $OrderItemsListArr]);
    }

}
