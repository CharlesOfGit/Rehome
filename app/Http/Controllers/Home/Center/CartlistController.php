<?php

namespace App\Http\Controllers\Home\Center;

use App\Http\Controllers\BaseController;
use App\User;
use Illuminate\Support\Facades\DB;

class CartlistController extends BaseController
{
    function list() {
        $username = session()->get('username');
        $userid   = User::where("username", $username)->value('id');
        $cartlist = DB::table('cart')
            ->join('product', 'cart.productid', '=', 'product.id')
            ->join('productimage', 'cart.productid', '=', 'productimage.productid')
            ->select('cart.buynum', 'cart.price', 'product.title', 'productimage.path')
            ->where('userid', $userid)
            ->get();

        return view("Home.Center.cartlist", ['cartlist' => $cartlist, 'total' => $total = 0]);
    }
}
