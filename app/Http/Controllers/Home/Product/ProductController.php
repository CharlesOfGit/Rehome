<?php
namespace App\Http\Controllers\Home\Product;

use App\Http\Controllers\BaseController;
use App\Product;
use App\Productimage;

class ProductController extends BaseController
{

    public function lister($pid)
    {
        // $productList = DB::table('Product')
        //     ->join('type', 'product.typestr', '=', 'type.id');
        //     ->join()
        //     ->join('productimage', 'cart.productid', '=', 'productimage.productid')
        // 根据pid查询
        $cols = Product::where("typestr", 'like', ">$pid>%")->orderBy('id', 'desc')
            ->paginate(4);
        // dd($pid);
        // 根据id把产品信息
        // 根据产品id，获取图片
        $prdid  = Product::where("typestr", 'like', ">$pid>%")->first();
        $images = Productimage::where("productid", $prdid->id)->get();
        // dd($cols);

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
