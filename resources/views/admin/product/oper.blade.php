@extends('admin.public.base')
@section('title',"商品管理")
@section('main')
<div>当前操作:商品管理</div>
<table width="100%">
	<tr>
		<th>id</th>
		<th>产品名称</th>
		<th>分类</th>
		<th>添加时间</th>
		<th>操作</th>
	</tr>
	@foreach($cols as $v)
	<tr>
		<td>{{$v->id}}</td>
		<td>{{$v->title}}</td>
		<td>{{$v->getIdstrToNamestr($v->typestr)}}</td>
		<td>{{$v->addtime}}</td>
		<td><a href="{{url('product/update',['id'=>$v->id])}}">修改</a>&nbsp;&nbsp;<a href="{{url('product/del',['id'=>$v->id])}}" onclick="javaScript:alert('确定要删除吗?')">删除</a></td>
	</tr>
	@endforeach

</table>
<div>
	{{$cols->appends($_GET)->links()}}
</div>
@endsection
