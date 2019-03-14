<?php
namespace App\Http\Controllers\Home\Center;

use App\Http\Controllers\BaseController;
use App\Orders;

class OrdersController extends BaseController
{
    public function orders()
    {
        return view("Home.Center.orders");
    }

}
