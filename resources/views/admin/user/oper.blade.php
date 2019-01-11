@extends('admin.public.base')
@section('title',"用户列表")
@section('main')
<div>用户管理</div>
<table width="100%">
    <tr>
        <th>id</th>
        <th>用户名</th>
        <th>邮箱</th>
        <th>注册时间</th>
        <th>管理员</th>
        <th>操作</th>
    </tr>
    @foreach($cols as $v)
    <tr>
        <td>{{$v->id}}</td>
        <td>{{$v->username}}</td>
        <td>{{$v->email}}</td>
        <th>{{$v->created_at}}</th>
        <td>{{$v->admin}}</td>
        <td>
            <a href="{{url('user/alter',['id'=>$v['id']])}}">管理员添加</a>&nbsp;&nbsp;
            <a href="{{url('user/alteroff',['id'=>$v['id']])}}">管理员取消</a>&nbsp;&nbsp;
            <a href="{{url('user/delete',['id'=>$v['id']])}}" onclick="javaScript:alert('您确定要删除吗？');">删除</a>
        </td>
    </tr>
    @endforeach

</table>
@endsection
