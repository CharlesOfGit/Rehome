@extends('admin.public.base')
@section('title',"管理分类")
@section('main')
<div>当前操作：管理分类</div>
<table width="100%">
	<tr>
		<th>ID</th>
		<th>分类名称</th>
		<th>PID</th>
		<th>操作</th>
	</tr>
	@foreach($arr as $v)
	<tr>
		<td>{{$v['id']}}</td>
		<td>{{$v['tname']}}</td>
		<td>{{$v['pid']}}</td>
		<td><a href="{{url('type/update',['id'=>$v['id']])}}">修改</a>&nbsp;&nbsp;<a href="{{url('type/del',['id'=>$v['id']])}}" onclick="javaScript:alert('确定要删除吗?')">删除</a></td>
	</tr>
	@endforeach

</table>
@endsection
