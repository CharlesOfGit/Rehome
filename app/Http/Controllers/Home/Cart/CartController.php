<?php

namespace App\Http\Controllers\Home\Cart;

use App\Cart;
use App\Http\Controllers\BaseController;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 *
 */
class CartController extends BaseController
{
    //商品添加
    public function add(Request $request)
    {
        $arr = $request->all();
        unset($arr['_token']);
        $productid = $arr['productid'];
        $number    = $arr['number'];
        // 用户id
        $username = session()->get('username');
        $userid   = User::where("username", $username)->value('id');
        //商品价格
        $productprice = Product::where("id", $productid)->value('price');
        $orgnum       = Cart::where('userid', $userid)->where('productid', $productid)->value('buynum');
        if (!empty($oldnum)) {
            $re = DB::table('cart')
                ->where('userid', $userid)
                ->where('productid', $productid)
                ->update(['buynum' => $orgnum + $number]);
        } else {
            $contact            = new Cart;
            $contact->productid = "$productid";
            $contact->userid    = "$userid";
            $contact->buynum    = "$number";
            $contact->price     = "$productprice";
            $re                 = $contact->save();
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
