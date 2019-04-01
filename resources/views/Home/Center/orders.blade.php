@extends('Home.public.center')
@section('title',"用户订单")
@section('main')
<div class="row">
    <h3>订单详情</h3>
    <table class="table" style="padding: 0;margin: 0;" class="text-center">
        <thead>
            <tr>
                <td class="text-center">商品信息</td>
                <td class="text-center">单价</td>
                <td class="text-center">状态</td>
            </tr>
        </thead>
        @foreach($OrderItemsListArr as $Orders)
        @foreach($Orders['OrderInfo'] as $Info)
        <tr>
            <td colspan="4">
                <div>
                    <div class="col-md-8">
                        订单编号：{{$Info->order_number}}
                    </div>
                    <div>
                        <span>{{$Info->order_at}}
                       </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><span class="glyphicon glyphicon-trash"></span></a>
                    </div>
                </div>
            </td>
        </tr>
        @foreach($Orders['OrderItemsInfoArr'] as $Items)
        @foreach($Items as $Item)
        <tr>
            <td class="text-center" colspan="">
                <div class="col-md-4">
                    <img style="width:80px; height:80px;" src="{{asset('uploads')}}/{{$Item->path}}">
                </div>
                <div class="col-md-4">
                    <span class="text-center">{{$Item->title}}</span>
                </div>
                <div class="col-md-4">
                    <span class="text-center">x{{$Item->buynum}}</span>
                </div>
            </td>
            <td class="text-center">￥{{$Item->price}}</td>
            <td class="text-center">订单详情</td>
        </tr>
        @endforeach
        @endforeach
        <tr>
            <td colspan="4">
                <div>
                    <div class="col-md-6">
                        <div>
                            <div>收货人：{{$Info->consignee}}</div>
                        </div>
                        <div>订单备注：</div>
                    </div>
                    <div class="col-md-4 col-md-offset-2">
                        <div>
                            <span>订单总价：￥{{$Info->total_amonut}}</span>
                        </div>
                        <div>
                            <span>订单状态：未支付</span>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
        @endforeach
    </table>
</div>
@endsection
