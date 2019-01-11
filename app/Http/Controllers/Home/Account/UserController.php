<?php
namespace App\Http\Controllers\Home\Account;

use App\Http\Controllers\BaseController;
use App\User;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    //登陆模板显示
    public function login()
    {
        return view('Home.Account.User.login');
    }
    //用户登录
    public function check(request $request)
    {
        // 登录验证
        $this->validate($request, [
            'username' => ["required"],
            'password' => ['required'],
            'captcha'  => ["required"],
        ], [
            'username.required' => '请输入用户名!',
            'password.required' => '请填写密码!',
            'captcha.required'  => '请填写验证码!',
        ]);
        // 获取参数
        $username = $request->get('username');
        $password = md5($request->get('password'));
        $captcha  = $request->get('captcha');
        //连接数据库
        $user = User::where("username", $username)->first();
        if (strtolower($captcha) == strtolower(session()->get('captcha', ''))) {

            if ($username == $user['username'] && $password == $user['password']) {
                //创建会话变量
                session()->put('username', $username);
                session()->put('centeruserid', $user->id);
                return redirect(url('/'))
                    ->with('message', '登录成功');
            } else {
                return redirect(url('UserLogin'))
                    ->with('message', '用户名或密码错误');
            }
        } else {
            return redirect()
                ->back()
                ->with('message', '验证码错误');
        }
    }
    //显示注册
    public function register()
    {
        return view('Home.Account.User.register');
    }
    // 注册验证
    public function save(Request $request)
    {
        //数据验证
        $this->validate($request, [
            'username'              => ["required", "unique:user", "regex:/^[a-z_]\w{3,19}$/i"],
            'password_confirmation' => ['required', "regex:/^[\S]{6,20}$/"],
            'password'              => 'confirmed',
            'email'                 => "email",
        ], [
            'username.required'              => '用户名必填!',
            'username.unique'                => '用户名已经被注册!',
            'username.regex'                 => '用户名格式错误!',
            'password_confirmation.required' => '密码必填!',
            'password_confirmation.regex'    => '密码格式错误!',
            'password.confirmed'             => '两次密码输入不一致!',
            'email.email'                    => '邮箱格式错误!',
        ]);
        //保存数据

        $user = new User();
        foreach ($request->all() as $k => $v) {
            if ($k != 'password_confirmation' && $k != '_token' && $k != 'captcha') {
                if ($k == 'password') {
                    $user->$k = md5($v);
                } else {
                    $user->$k = $v;
                }
            }
        }
        $re      = $user->save();
        $message = $re ? "注册成功" : "注册失败";
        return redirect(url('/'))->with('message', $message);
    }
    public function UserLogout()
    {
        session()->flush();
        return redirect(url('/'))->with('message', '退出成功!');
    }

}
