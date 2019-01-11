@extends('admin.public.base')
@section('title',"修改分类" )
@section('main')
		<div>当前操作：修改分类</div>
		<form action="{{url('type/usave')}}" method="post">
		<table width="100%">
			<tr>
				<td>名称：</td>
				<td><input value="{{$ob->tname}}" type="text" name="tname"></td>
				<td></td>
			</tr>
			<tr>
				<td>父分类：</td>
				<td>
					<select disabled="disabled" name="pid">
						<option value='0'>顶级</option>
						@foreach($arr as $v)
						<option value='{{$v['id']}}'>{{$v['tname']}}</option>
						@endforeach
					</select>
				</td>
				<td></td>
			</tr>
			<tr>
				<td colspan="3">
					{{csrf_field()}}
					<input type="hidden" name='id' value="{{$ob->id}}"/>
					<input type="submit" value="提交"/>
					<input type="button" name="Submit" onclick="javascript:history.back(-1);" value="返回">
				</td>
			</tr>
		</table>
		</form>
<script type="text/javascript">
$("[name='pid']").val('{{$ob->pid}}');
</script>
@endsection
