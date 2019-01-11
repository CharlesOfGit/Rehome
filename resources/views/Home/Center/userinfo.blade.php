@extends('Home.public.center')
@section('title',"个人信息")
@section('main')
<h3>个人资料</h3>
<div id="msg"></div>
<form action="{{url('userinfo/pwdsave')}}" method="post">
    <table cellspacing="0" class="table table-condensed">
        <tr>
            @if(session()->has('message'))
            <div class="message">{{session()->get('message')}}<a href="javascript:$('.message').hide(500)">关闭</a></div>
            @endif
            <th width="100">当前密码</th>
            <td> <input type="password" name="oldpassword" class="form-control" autocomplete="off" placeholder="请输入当前密码" size="25" /></td>
            <td>
                <span class="help-block" style="color: red">{{$errors->first('oldpassword')}}</span>
            </td>
        </tr>
        <tr>
            <th>新密码</th>
            <td> <input type="password" name="newpassword_confirmation" class="form-control" autocomplete="off" placeholder="请输入6-20数字或字母" size="25" /></td>
            <td>
                <span class="help-block" style="color: red">{{$errors->first('newpassword_confirmation')}}</span>
            </td>
        </tr>
        <tr>
            <th>确认新密码</th>
            <td><input type="password" name="newpassword" class="form-control" autocomplete="off" placeholder="请输入6-20数字或字母" size="25" /></td>
            <td>
                <span class="help-block" style="color: red">{{$errors->first('newpassword')}}</span>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                {{csrf_field()}}
                <input id="usave" type="submit" value="确认修改" class="btn btn-primary" />
            </td>
        </tr>
    </table>
</form>
<!-- 其他信息 -->
<h3>修改信息</h3>
@foreach($cols as $v)
<form action="{{url('userinfo/infosave')}}" method="post">
    <table cellspacing="0" class="table table-condensed">
        <th>性　别： </th>
        <td><input type="radio" name="sex" value="0" checked="checked" />
            保密&nbsp;&nbsp;
            <input type="radio" name="sex" value="1" />
            男&nbsp;&nbsp;
            <input type="radio" name="sex" value="2" />
            女&nbsp;&nbsp;
        </td>
        </tr>
        <tr>
            <th width="100">邮箱地址：</th>
            <td><input name="email" type="text" size="25" autocomplete="off" class="form-control" value="{{$v->email}}" /></td>
            <td>
                <span class="help-block" style="color: red">{{$errors->first('email')}}</span>
            </td>
        </tr>
        <tr>
            <th>QQ：</th>
            <td>
                <input name="qq" type="text" size="25" autocomplete="off" class="form-control" value="{{$v->qq}}" /></td>
            <td>
                <span class="help-block" style="color: red">{{$errors->first('qq')}}</span>
            </td>
        </tr>
        <tr>
            <th>手机：</th>
            <td>
                <input name="phonenum" type="text" size="25" autocomplete="off" class="form-control" value="{{$v->phonenum}}" /></td>
            <td>
                <span class="help-block" style="color: red">{{$errors->first('phonenum')}}</span>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                {{csrf_field()}}
                <input id="usave" type="submit" value="确认修改" class="btn btn-primary" />
            </td>
        </tr>
    </table>
</form>
@endforeach
@endsection