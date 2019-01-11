<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

//后台登录
class AdminController extends Controller
{
    public function adminlogin()
    {
        return view('admin.adminlogin');
    }

    public function admincheck(request $request)
    {
        $this->validate($request, [
            'username' => ["required"],
            'password' => ['required'],
        ], [
            'username.required' => '请输入用户名!',
            'password.required' => '请填写密码!',
        ]);

        $username = $request->get('username');
        $password = md5($request->get('password'));
        $user     = User::where("username", $username)->first();

        if ($user['username'] == $username && $user['password'] == $password && $user['admin'] == 1) {
            session()->put('username', $username);
            session()->put('adminid', $user->id);

            return redirect(url('admin/home'))
                ->with('message', '登录成功');
        } else {
            return redirect(url('admin/login'))
                ->with('message', '用户名或密码错误');
        }
    }
    public function adminlogout()
    {
        session()->flush();
        return redirect(url('admin/login'))
            ->with('message', '退出成功!');

    }
    public function AdHomePage()
    {
        return view('admin.public.base');
    }
}
