<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>用户登录</title>
    <link href="{{URL::asset('/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('/css/sweetalert2.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('/css/animate.css')}}" rel="stylesheet">
</head>

<body>
    <div style="height:250px"></div>
    <div class="container" style="width:300px">
        <form action="{{url('login/check')}}" method="post" class="form-group">
            {{csrf_field()}}
            <div class="control-label "><h3>用户登录</h3>
            </div>
            <div class="form-group">
                <label class="control-label">用户名:</label>
                <input type="text" name='username' value="{{old('username')}}" class="form-control" placeholder="请输入用户名" autocomplete="off" />
                <span class="help-block" style="color: red">{{$errors->first('username')}}</span>
            </div>
            <div class="form-group">
                <label class="control-label">密码:</label>
                <input type="password" name='password' class="form-control" placeholder="请输入密码" />
                <span class="help-block" style="color: red">{{$errors->first('password')}}</span>
            </div>
            <div class="form-group">
                <label class="control-label">验证码：</label>
                <input type='text' name="captcha" value="{{old('captcha')}}" class="form-control" placeholder="请输入验证码" autocomplete="off" />
            </div>
            <div class="form-group">
                <img src="{{url('captcha/show')}}" id="captcha" />
                <span class="help-block" style="color: red">{{$errors->first('captcha')}}</span>
            </div>
            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="" id="" value=""> 七天免密登录
                    </label>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" value="登录" class="btn btn-primary">
                <input type="button" value="返回" class="btn btn-default" onclick="window.history.back()" />
            </div>
        </form>
        <!-- bootstrap 加载-->
        <script src="{{URL::asset('/js/jquery3.js')}}"></script>
        <script src="{{URL::asset('/js/sweetalert2.min.js')}}"></script>
        <script src="{{URL::asset('/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <script type="text/javascript">
        var c = document.getElementById('captcha');
        c.onclick = function() {
            this.src = "{{url('captcha/show')}}?rand=" + Math.random();
        }
        </script>
</body>

</html>
@if(session()->has('message'))
<script type="text/javascript">
Swal.fire({
    type: 'error',
    title: "{{session()->get('message','')}}",
    animation: false,
    customClass: 'animated bounce'
})
</script>
@endif