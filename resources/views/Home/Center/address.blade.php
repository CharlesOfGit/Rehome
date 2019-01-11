@extends('Home.public.center')
@section('title',"我的地址")
@section('main')
<h3>地址管理</h3>
@foreach($cols as $v)
<form action="{{url('address/update')}}" method="post">
    <table cellspacing="0" class="tableList">
        <tr>
            <td>收货人姓名:</td>
            <td><input name="consignee" type="text" value="{{$v->consignee}}" class="textInput" />
                <span class="textDesc">(必填)</span> </td>
            <td>手机:</td>
            <td><input name="mobile" type="text" value="{{$v->mobile}}" class="textInput" /></td>
        </tr>
        <tr>
            <td>详细地址:</td>
            <td><input name="address" type="text" value="{{$v->address}}" class="textInput" />
                <span class="textDesc">(必填)</span></td>
            <td>最佳送货时间:</td>
            <td><input name="best_time" type="text" value="{{$v->best_time}}" class="textInput" /></td>
        </tr>
        <tr>
            <td colspan="4" align="center">
                <input type="submit" value="确认修改" />
                <input name="button" type="button" onclick="if (confirm('你确认要删除该收货地址吗？'))location.href='{{url("address/del",["id"=>$v->id])}}'" value="删除" />
                @if($v->status == 0)
                <input name="button" type="button" onclick="if (confirm('你确认要将该收货地址选中吗？'))location.href='{{url("address/selected",["id"=>$v->id])}}'" value="选中" />
                @else
                已经选中
                @endif
                {{csrf_field()}}
                <input name="address_id" type="hidden" value="{{$v->id}}" />
            </td>
        </tr>
    </table>
</form>
@endforeach
<form action="{{url('address/save')}}" method="post">
    <table cellspacing="0" class="tableList">
        <tr>
            <td>收货人姓名:</td>
            <td><input name="consignee" type="text" id="consignee_1" value="" class="textInput" />
                <span class="textDesc">(必填)</span> </td>
            <td>手机:</td>
            <td><input name="mobile" type="text" id="mobile_1" value="" class="textInput" /></td>
        </tr>
        <tr>
            <td>详细地址:</td>
            <td><input name="address" type="text" id="address_1" value="" class="textInput" />
                <span class="textDesc">(必填)</span></td>
            <td>最佳送货时间:</td>
            <td><input name="best_time" type="text" id="best_time_1" value="" class="textInput" /></td>
        </tr>
        <tr>
            <td colspan="4" align="center">
                <input type="submit" name="submit" value="新增收货地址" />
                {{csrf_field()}}
            </td>
        </tr>
    </table>
</form>
@endsection