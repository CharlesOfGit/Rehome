@extends('Home.public.center')
@section('title', "结算页")
@section('main')
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
                                <span>{{$v->mobile}}</span>
                                @if($v->status == 1)
                                &nbsp;&nbsp;&nbsp;&nbsp;<span class="label label-default">默认地址</span>
                                @endif
                            </div>
                            @endforeach
                        </div>
                        &nbsp;&nbsp;
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">更多地址</a>
                        <div id="collapseOne" class="panel-collapse collapse" aria-labelledby="headingOne">
                            <div>
                                @foreach($alladdress as $v)
                                <div class="pull-left" id="newaddress_{{$v->id}}">
                                    <span>&nbsp;&nbsp;&nbsp;{{$v->consignee}}</span>
                                    <span>{{$v->address}}</span>
                                    <span>{{$v->mobile}}</span>
                                    @if($v->status == 1)
                                    &nbsp;&nbsp;&nbsp;&nbsp;<span class="label label-default">默认地址</span>
                                    @endif
                                </div>
                                <div class="pull-right">
                                    <a href="javascript:void(0);" onclick="setAddress({{$v->id}})">选择地址</a>
                                </div> <br>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
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
        </script>
        <tr>
            <td colspan="5">
                <h4>支付方式</h4>
                <p>
                    <span>货到付款</span>
                    <span>在线支付</span>
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="4"><h4>商品信息</h4>
            </td>
        </tr>
        <tr style="text-align:center">
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
        @endforeach
    </table>
</div>
<div>
    {{csrf_field()}}
    <button class="btn btn-primary">返回购物车</button>
    <button class="btn btn-info">提交订单</button>
</div>
@endsection