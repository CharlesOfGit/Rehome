@extends('Home.public.center') @section('title', "结算页") @section('main')
<h3>结算页</h3>
<div class="table table-bordered">
    <table class="table">
        <tr>
            <td colspan="5" id="addressInfo">
                <h4>收货人信息</h4>
                <div class="panel-group" id="accordion">
                    <div>
                        <div id="addressinfo">
                            @foreach($address as $v)
                            <div>
                                <span>&nbsp;&nbsp;&nbsp;{{$v->consignee}}</span>
                                <span>{{$v->address}}</span>
                                <span>{{$v->mobile}}</span> @if($v->status == 1) &nbsp;&nbsp;&nbsp;&nbsp;
                                <span class="label label-default">默认地址</span> @endif
                            </div>
                            @endforeach
                        </div>
                        &nbsp;&nbsp;
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">更多地址</a>
                        <a href="{{url('center/address')}}">编辑地址</a>
                        <div id="collapseOne" class="panel-collapse collapse" aria-labelledby="headingOne">
                            <div>
                                @foreach($alladdress as $v)
                                <div class="pull-left" id="newaddress_{{$v->id}}">
                                    <span>&nbsp;&nbsp;&nbsp;{{$v->consignee}}</span>
                                    <span>{{$v->address}}</span>
                                    <span>{{$v->mobile}}</span> @if($v->status == 1) &nbsp;&nbsp;&nbsp;&nbsp;
                                    <span class="label label-default">默认地址</span> @endif
                                </div>
                                <div class="pull-right">
                                    <a href="javascript:void(0);" onclick="setAddress({{$v->id}})">选择地址</a>
                                </div>
                                <br> @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="5">
                <h4>支付方式</h4>
                <p>
                    <h3>在线支付</h3>
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <h4>商品信息</h4>
            </td>
        </tr>
        <tr class="text-center">
            <td colspan="2">商品名称</td>
            <td>单价</td>
            <td>数量</td>
            <td>小计</td>
        </tr>
        @foreach($settlementList as $v)
        <tr align="center">
            <td>{{$v->title}}</td>
            <td>
                <img style="width:80px; height:80px;" src="{{ asset('uploads') }}/{{$v->path}}" title="图片">
            </td>
            <td>{{$v->price}}元</td>
            <td>{{$v->buynum}}</td>
            <td>{{$v->price*$v->buynum}}元</td>
        </tr>
        <input type="hidden" value="{{$total += $v->price * $v->buynum}}">
        @endforeach
    </table>
</div>
<div class="row">
    <div class="col-md-4">
         {!!csrf_field()!!}
        <a href="{{url('center/cartlist')}}" class="btn btn-primary">返回购物车</a>
        <button class="btn btn-info" onclick="saveorders('{{$StrCartsid}}')">提交订单</button>
    </div>
    <div class="col-md-7 col-md-offset-1">
        <h3 style="margin: 0">共计：<span id="total_amonut">{{$total}}</span>元</h3>
        @foreach($address as $v)
        <p style="margin: 0">收货地址：<span id="Useraddress">{{$v->address}}</span></p>
        <p style="margin: 0">收货人： <span>{{$v->consignee}}</span></p>
        @endforeach
    </div>
</div>
<script>
function setAddress(id) {
    var url = "{{url('settlement/setAddress')}}";
    var data = {
        "id": id,
        "_token": $('input[name=_token]').val()
    };
    var success = function(response) {
        if (response.errno == 1) {
            parent.location.reload();
        }
    }
    $.post(url, data, success, "json");
}

function saveorders(cartsid) {
    var useraddress = $('#Useraddress').text();
    var total_amonut = $('#total_amonut').text();
    var url = '{{url("orders/saveorders")}}';
    var data = {
        'address': useraddress,
        'cartsid':cartsid,
        'total_amount': total_amonut,
        '_token': $('input[name=_token]').val(),
    };
    var success = function(re) {
        if (re.result == 'success') {
            Swal.fire({
                position: 'center',
                type: 'success',
                title: re.msg,
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                location.reload();
            });
        } else {
            Swal.fire({
                position: 'center',
                type: 'info',
                title: re.msg,
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                location.reload();
            });
        }
    }
    $.post(url, data, success, "json");
}
</script>
@endsection
