<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>管理员登录</title>
    <link href="{{URL::asset('/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <script type="text/javascript">
    var num = 5;

    function fun1() {
        num--;
        if (num == 0) {
            document.getElementById('s').style.display = 'none';
        } else {
            document.getElementById('showNum').innerHTML = num;
            setTimeout(fun1, 1000);
        }
    }
    </script>
</head>

<body>
    @if(session()->has('message'))
    <div id='s' class="message">{{session()->get('message','')}}<b id='showNum'>5</b></div>
    @endif
    <div style="height:250px"></div>
    <div class="container" style="width:300px">
        <form action="{{url('admin/check')}}" method="post" class="form-group">
            {{csrf_field()}}
            <div class="control-label "><h3>管理员登录</h3>
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
                <input type="submit" value="登录" class="btn btn-primary">
                <input type="submit" value="取消" class="btn btn-default">
            </div>
        </form>
        <!-- bootstrap 加载-->
        <script src="{{URL::asset('/js/jquery3.js')}}"></script>
        <script src="{{URL::asset('/bootstrap/dist/js/bootstrap.min.js')}}"></script>
</body>

</html>
<script type="text/javascript">
setTimeout(fun1, 1000);
</script>
