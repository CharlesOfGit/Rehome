<?php

namespace App\Http\Controllers\Home\Center;

use App\Http\Controllers\BaseController;
use App\Product;
use App\ProductCollect;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CollectController extends BaseController
{

    public function collect()
    {
        $username    = session()->get('username');
        $userid      = User::where("username", $username)->value('id');
        $collectList = DB::table('product_collect')
            ->join('product', 'product_collect.productid', '=', 'product.id')
            ->join('productimage', 'product_collect.productid', '=', 'productimage.productid')
            ->select('product_collect.id', 'product_collect.price', 'product_collect.productid', 'product.title', 'productimage.path')
            ->where('userid', $userid)
            ->get();

        return view("Home.Center.collect", ['collectList' => $collectList]);
    }
    //商品收藏
    public function add(Request $request)
    {
        $arr = $request->all();
        unset($arr['_token']);
        $productid = $arr['productid'];
        // 用户id
        $username      = session()->get('username');
        $userid        = User::where("username", $username)->value('id');
        $collectListid = ProductCollect::where("userid", $userid)->where("productid", $productid)->value('id');

        if (empty($collectListid)) {
            $productprice       = Product::where("id", $productid)->value('price');
            $contact            = new ProductCollect;
            $contact->productid = "$productid";
            $contact->userid    = "$userid";
            $contact->price     = "$productprice";
            $re                 = $contact->save();

            $message   = $re ? "添加成功" : "添加失败";
            $returnArr = [
                'result' => $re ? 'success' : 'error',
                'msg'    => $message,
                'data'   => null,
            ];
            echo json_encode($returnArr);
        }
    }
    //收藏删除
    public function delPro(Request $request)
    {
        $productid = $request->get('productid');
        $username  = session()->get('username');
        $userid    = User::where("username", $username)->value('id');
        $re        = DB::table('product_collect')->where('userid', $userid)->where('productid', $productid)->delete();
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
