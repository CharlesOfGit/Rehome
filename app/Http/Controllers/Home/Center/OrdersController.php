<?php
namespace App\Http\Controllers\Home\Center;

use App\Http\Controllers\BaseController;
use App\Oders;
use Illuminate\Http\Request;

class OrdersController extends BaseController
{
    public function orders()
    {
        return view("Home.Center.orders");
    }
    public function saveOrders(Request $request)
    {
        $all         = $request->except('_token');
        $address     = $all['address'];
        $totalAmonut = $all['total_amonut'];
        $userid      = session()->get('centeruserid');
        $orderNumber = Oders::findAvailableNo();
        dd($orderNumber);
    }

}
