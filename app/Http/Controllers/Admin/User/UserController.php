<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;

/**
 *
 */
class UserController extends Controller
{

    public function oper()
    {
        $cols = User::orderBy('id', 'desc')->paginate(5);

        return view('admin.user.oper', ['cols' => $cols]);
    }

    // 添加管理员
    public function alter($id)
    {
        $re      = DB::table('user')->where('id', $id)->update(['admin' => '1']);
        $message = $re ? "添加成功" : "添加失败";
        //跳转并提示
        return redirect()->back()->with('message', $message);
    }
    public function alteroff($id)
    {
        $re      = DB::table('user')->where('id', $id)->update(['admin' => '0']);
        $message = $re ? "添加成功" : "添加失败";
        //跳转并提示
        return redirect()->back()->with('message', $message);
    }
    // 删除用户
    public function delete($id)
    {
        $re      = DB::table('user')->where('id', '=', $id)->delete();
        $message = $re ? "删除成功" : "删除失败";
        //跳转并提示
        return redirect()->back()->with('message', $message);
    }
}
