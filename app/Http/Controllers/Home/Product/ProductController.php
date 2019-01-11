<?php
namespace App\Http\Controllers\Home\Product;

use App\Http\Controllers\BaseController;
use App\Product;
use App\Productimage;

class ProductController extends BaseController
{

    public function lister($pid)
    {
        //根据pid查询
        $cols = Product::where("typestr", 'like', ">$pid>%")->orderBy('id', 'desc')
            ->paginate(3);
        // 根据id把产品信息
        // 根据产品id，获取图片
        $prdid  = Product::where("typestr", 'like', ">$pid>%")->first();
        $images = Productimage::where("productid", $prdid->id)->get();
        //给模板传pid
        return view("Home.product.lister", ['pid' => $pid, 'cols' => $cols, 'images' => $images]);
    }
    public function detail($id)
    {
        // 根据id把产品信息
        $product = Product::find($id);
        //根据产品id，获取产品图片
        $images = Productimage::where("productid", $id)->get();
        return view('Home.product.detail', ['product' => $product, 'images' => $images]);
    }

}
