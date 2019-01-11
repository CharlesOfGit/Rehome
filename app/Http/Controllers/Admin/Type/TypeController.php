<?php

namespace App\Http\Controllers\Admin\Type;

use App\Http\Controllers\Controller;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 *
 */
class TypeController extends Controller
{
    public function add()
    {
        //获取所有分类分类，传给模板
        $type = new Type();
        $arr  = $type->getTypeAllToArray();
        return view('admin.type.add', ['arr' => $arr]);
    }
    public function save(Request $request)
    {
        $arr = $request->all();
        //删除数组中的元素_token
        unset($arr['_token']);
        $re = DB::table('type')->insert($arr);
        //跳转提示
        $message = $re ? '添加成功' : '添加失败';
        return redirect()->back()->with('message', $message);
    }
    //分类list
    public function oper()
    {
        $type = new Type();
        $arr  = $type->getTypeAllToArray();
        return view('admin.type.oper', ['arr' => $arr]);
    }
    public function del($id)
    {
        $re      = Type::where('id', $id)->update(['status' => 9]);
        $message = $re ? '删除成功' : '添加失败';
        return redirect()->back()->with('message', $message);
    }
    public function update($id)
    {
        $type = new Type();
        $arr  = $type->getTypeAllToArray();
        //根据id，获取对应的记录
        $ob = $type->where('id', $id)->first();
        return view('admin.type.update', ['ob' => $ob, 'arr' => $arr]);
    }
    public function usave(Request $request)
    {
        $arr = $request->all();
        $id  = $arr['id'];
        unset($arr['_token']);
        unset($arr['id']);
        $re      = DB::table('type')->where('id', $id)->update($arr);
        $message = $re ? '修改成功' : "修改失败";
        return redirect('type/oper')->with('message', $message);
    }

}
