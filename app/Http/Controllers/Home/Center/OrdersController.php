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

            $OrderInfo = DB::table('orders')
                ->join('address', 'address.id', "=", 'orders.addressid')
                ->select('orders.order_number', 'orders.order_at', 'orders.total_amonut', 'orders.addressid', 'address.consignee')
                ->where('orders.id', $value)
                ->get();

            //查询订单中的商品列表
            $OrderItemsList = DB::table('order_items')
                ->select('order_items.id')
                ->where('order_items.orderid', $value)
                ->get();

            foreach ($OrderItemsList as $key) {
                $OrderItemsInfo = DB::table('order_items')
                    ->join('orders', 'orders.id', '=', 'order_items.orderid')
                    ->join('product', 'product.id', '=', 'order_items.productid')
                    ->join('productimage', 'product.id', '=', 'productimage.productid')
                    ->select('productimage.path', 'order_items.buynum', 'product.title', 'product.price', 'orders.order_number', 'orders.order_at')
                    ->where('order_items.id', $key->id)
                    ->get();
                $OrderItemsInfoArr[$key->id] = reset($OrderItemsInfo);
            }

            //存储订单信息和商品信息
            $OrderItemsListArr[$value]['OrderInfo']         = $OrderInfo;
            $OrderItemsListArr[$value]['OrderItemsInfoArr'] = $OrderItemsInfoArr;

            //销毁变量以避免重复信息
            unset($OrderInfo);
            unset($OrderItemsInfoArr);
        }

        return view("Home.Center.orders", ['OrderItemsListArr' => $OrderItemsListArr]);
    }

}
