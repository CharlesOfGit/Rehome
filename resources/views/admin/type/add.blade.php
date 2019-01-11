@extends('admin.public.base')
@section('title',"添加分类")
@section('main')
		<div>当前操作：添加分类</div>
		<form action="{{url('type/save')}}" method="post">
		<table width="100%">
			<tr>
				<td>名称：</td>
				<td><input type="text" name="tname" autocomplete="off" placeholder="导航显示"></td>
				<td></td>
			</tr>
			<tr>
				<td>父分类：</td>
				<td>
					<select name="pid">
						<option value='0'>顶级</option>
						@foreach($arr as $v)
						<option value='{{$v["id"]}}'>{{$v['tname']}}</option>
						@endforeach
					</select>
				</td>
				<td></td>
			</tr>
			<tr>
				<td colspan="3">
					{{csrf_field()}}
					<input type="submit" value="提交"/>
					<input type="button" name="Submit" onclick="javascript:history.back(-1);" value="返回">
				</td>
			</tr>
		</table>
		</form>
@endsection
