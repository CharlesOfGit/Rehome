<?php
namespace App\Http\Controllers\Home\Product;

use App\Http\Controllers\BaseController;
use App\Product;
use App\ProductCollect;
use App\Productimage;
use App\User;

class ProductController extends BaseController
{

    public function lister($pid)
    {

        $cols = Product::where("typestr", 'like', ">$pid>%")->orderBy('id', 'desc')
            ->paginate(4);
        $prdid  = Product::where("typestr", 'like', ">$pid>%")->first();
        $images = Productimage::where("productid", $prdid->id)->get();
        return view("Home.product.lister", ['pid' => $pid, 'cols' => $cols, 'images' => $images]);
    }
    public function detail($id)
    {
        // 根据id把产品信息
        $product = Product::find($id);
        //根据产品id，获取产品图片
        $images        = Productimage::where("productid", $id)->get();
        $username      = session()->get('username');
        $userid        = User::where("username", $username)->value('id');
        $collectListid = ProductCollect::where("userid", $userid)->where("productid", $id)->value('id');

        return view('Home.product.detail', ['product' => $product, 'images' => $images, 'collectListid' => $collectListid]);
    }

}
