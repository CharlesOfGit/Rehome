<?php
namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Product;
use App\Productimage;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // 商品添加
    public function add()
    {
        $type = new Type();
        $arr  = $type->getTypeAllToArray();
        return view('admin.product.add', ['arr' => $arr]);
    }
    //保存
    public function save(Request $request)
    {
        $arr   = $request->all();
        $files = isset($arr['upload']) ? $arr['upload'] : false;
        unset($arr['_token']);
        unset($arr['upload']);
        //保存产品信息
        $product = new Product();
        //赋值
        foreach ($arr as $k => $v) {
            $product->$k = $v;
        }
        $re = $product->save(); //insertGetId()
        if ($re) {
            //获取productid
            $productid = $product->id;
            //保存图片
            if ($files) {
                foreach ($files as $v) {
                    $productimage            = new Productimage();
                    $path                    = $v->store('product', 'uploads');
                    $productimage->productid = $productid;
                    $productimage->path      = $path;
                    $productimage->save();
                }
            }
            //写产品图片表
            return redirect()->back()->with('message', "商品保存成功");
        } else {
            return redirect()->back()->with('message', "商品保存失败");
        }
    }
    //商品操作
    public function oper()
    {
        $cols = Product::orderBy('id', 'desc')->paginate(3);
        return view('admin.product.oper', ['cols' => $cols]);
    }
    //修改页面
    public function update($id)
    {
        $type = new Type();
        $arr  = $type->getTypeAllToArray();
        //根据id,获取产品记录
        $product = Product::where('id', $id)->first();
        //根据产品id，获取图片
        $imageCols = Productimage::where("productid", $id)->get();
        return view('admin.product.update', ['product' => $product, 'arr' => $arr, 'imageCols' => $imageCols]);
    }
    // 修改
    public function usave(Request $request)
    {
        $id = $arr['id'];
        unset($arr['_token']);
        unset($arr['upload']);
        unset($arr['id']);
        $re      = DB::table('product')->where('id', $id)->update($arr);
        $message = $re ? '修改成功' : "修改失败";
        return redirect('product/oper')->with('message', $message);
    }
    //删除
    public function del($id)
    {
        $re      = product::where('id', $id)->delete();
        $message = $re ? '删除成功' : '添加失败';
        return redirect()->back()->with('message', $message);
    }

    public function delimage(Request $request)
    {
        $imageId = $request->get('id');

        $productimage = Productimage::where('id', $imageId)->first();
        //删除图片
        @unlink("./upload/" . $productimage->path);
        //删除表记录
        $re        = $productimage->delete();
        $message   = $re ? "删除成功" : "删除失败";
        $returnArr = [
            'result' => $re ? 'success' : 'error',
            'msg'    => $message,
            'data'   => null,
        ];
        echo json_encode($returnArr);
    }

}
