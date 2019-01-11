@extends('Home.public.base')
@section('title',"用户注册")
@section('main')
<div class="container">
    <h3>用户注册</h3>
    <form action="{{url('user/save')}}" method="post" class="form-group">
        <div class="table-responsive">
            <table class="table  table-hover table-condensed table-striped table-condensed">
                <tr>
                    <td width="100px">用户名：</td>
                    <td width="288px">
                        <input value="{{old('username')}}" type="text" name="username" class="form-control" autocomplete="off" />
                    </td>
                    <td>
                        <span class="help-block" style="color: red">{{$errors->first('username')}}</span>
                    </td>
                </tr>
                <tr>
                    <td>密码：</td>
                    <td>
                        <input type="password" name="password_confirmation" class="form-control" autocomplete="off" />
                    </td>
                    <td>
                        <span class="help-block" style="color: red">{{$errors->first('password_confirmation')}}</span>
                    </td>
                </tr>
                <tr>
                    <td>确认密码：</td>
                    <td>
                        <input type="password" name="password" class="form-control" autocomplete="off" />
                    </td>
                    <td>
                        <span  class="help-block" style="color:red">{{$errors->first('password')}}</span>
                    </td>
                </tr>
                <tr>
                    <td>邮箱：</td>
                    <td>
                        <input value="{{old('email')}}" type="text" name="email" class="form-control" autocomplete="off" />
                    </td>
                    <td>
                        <span class="help-block" style="color: red">{{$errors->first('email')}}</span>
                    </td>
                </tr>
                <tr>
                    <td>验证码：</td>
                    <td>
                        <input type='text' name="captcha" value="{{old('captcha')}}" class="form-control" placeholder="请输入验证码" autocomplete="off" />
                        <span class="help-block" style="color: red">{{$errors->first('captcha')}}</span>
                    </td>
                    <td><img src="{{url('captcha/show')}}" id="captcha" /></td>
                </tr>
                <tr>
                    <td colspan="3">
                        {{csrf_field()}}
                        <input type="submit" value="提交" class="btn btn-primary" />
                        <input type="reset" value="重置" class="btn btn-info" />
                        <input type="button" value="返回" class="btn btn-default" onclick="window.history.back()" />
                    </td>
                </tr>
            </table>
        </div>
    </form>
</div>
<script type="text/javascript">
var c = document.getElementById('captcha');
c.onclick = function() {
    this.src = "{{url('captcha/show')}}?rand=" + Math.random();
}
</script>
@endsection