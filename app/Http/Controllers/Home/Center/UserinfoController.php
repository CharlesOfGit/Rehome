<?php
namespace App\Http\Controllers\Home\Center;

use App\Http\Controllers\BaseController;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * 个人资料
 */
class UserinfoController extends BaseController
{

    public function userinfo()
    {
        $cols = User::where('username', session()->get('username'))->get();
        return view("Home.Center.userinfo", ['cols' => $cols]);
    }
    public function pwdsave(Request $request)
    {
        $this->validate($request, [
            'oldpassword'              => ["required"],
            'newpassword_confirmation' => ['required'],
            'newpassword_confirmation' => ['required', "regex:/^[\S]{6,20}$/"],
            'newpassword'              => 'confirmed',
        ], [
            'oldpassword.required'              => '请填写密码!',
            'newpassword_confirmation.required' => '密码必填!',
            'newpassword_confirmation.regex'    => '密码格式错误!',
            'newpassword.confirmed'             => '两次密码输入不一致!',
        ]);
        $oldpassword = md5($request->get('oldpassword'));
        $newpassword = md5($request->get('newpassword'));
        $username    = session()->get('username');
        $password    = User::where("username", $username)->value('password');
        if ($oldpassword == $password) {
            $re      = DB::table('user')->where('username', $username)->update(['password' => $newpassword]);
            $message = $re ? "修改成功" : "修改失败";
            return redirect()->back()->with('message', $message);
        } else {
            return redirect()
                ->back()
                ->with('message', '原始密码错误！');
        }
    }
    public function infosave(Request $request)
    {
        $this->validate($request, [
            'email'    => ["required", "email"],
            'qq'       => ["required", "regex:/^[1-9][0-9]{4,}/"],
            'phonenum' => ["required", "regex:/^1([38][0-9]|4[579]|5[0-3,5-9]|6[6]|7[0135678]|9[89])\d{8}$/"],
        ], [
            'email.required'    => '邮箱必填',
            'email'             => '邮箱格式错误!',
            'qq.required'       => 'QQ必填!',
            'qq.regex'          => 'QQ格式错误',
            'phonenum.required' => '手机必填',
            'phonenum.regex'    => '手机格式错误',
        ]);
        $username = session()->get('username');
        $arr      = $request->all();
        unset($arr['_token']);
        $re      = DB::table('user')->where('username', $username)->update($arr);
        $message = $re ? "修改成功" : "修改失败";
        return redirect()->back()->with('message', $message);
    }
}
