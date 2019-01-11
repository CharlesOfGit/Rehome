<?php

namespace App\Http\Controllers\Home\Center;

use App\Http\Controllers\BaseController;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartlistController extends BaseController
{
    function list() {
        $username = session()->get('username');
        $userid   = User::where("username", $username)->value('id');
        $cartlist = DB::table('cart')
            ->join('product', 'cart.productid', '=', 'product.id')
            ->join('productimage', 'cart.productid', '=', 'productimage.productid')
            ->select('cart.buynum', 'cart.price', 'cart.productid', 'product.title', 'productimage.path')
            ->where('userid', $userid)
            ->get();

        return view("Home.Center.cartlist", ['cartlist' => $cartlist, 'total' => $total = 0]);
    }
    public function changeNum(Request $request)
    {

        $productid = $request->get('productid');
        $num       = $request->get('num');
        $username  = session()->get('username');
        $userid    = User::where("username", $username)->value('id');
        $re        = DB::table('cart')->where('userid', $userid)->where('productid', $productid)->update(['buynum' => $num]);
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
