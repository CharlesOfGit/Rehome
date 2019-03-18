@extends('Home.public.center') @section('title',"用户订单") @section('main')
<div class="row">
    <h3>订单详情</h3>
    <table class="table" style="padding: 0;margin: 0;" class="text-center">
        <thead>
            <tr>
                <td class="text-center">商品信息</td>
                <td class="text-center">单价</td>
                <td class="text-center">收货人</td>
                <td class="text-center">总金额</td>
                <td class="text-center">状态</td>
                <td class="text-center">操作</td>
            </tr>
        </thead>
        @foreach($OrderItemsList as $v)
        <tr>
            <td class="text-center" colspan="">
                <div class="col-md-4">
                    <img style="width:80px; height:80px;" src="{{ asset('uploads') }}/{{$v->path}}">
                </div>
                <div class="col-md-4">
                    <span class="text-center">{{$v->title}}</span>
                </div>
                <div class="col-md-4">
                    <span class="text-center">x{{$v->buynum}}</span>
                </div>
            </td>
            <td class="text-center">￥{{$v->price}}</td>
            <td class="text-center">{{$v->consignee}}</td>
            <td class="text-center">￥{{$v->price}}</td>
            <td class="text-center">状态</td>
            <td class="text-center">
                <div><a href="#">付款</a></div>
                <div><a href="#">取消订单</a></div>
            </td>
        </tr>
        <tr>
            <td colspan="6">
                <div>
                    <div class="col-md-6">
                        <div>
                            <div>收货地址：{{$v->address}}</div>
                        </div>
                        <div>订单备注：</div>
                        <div>订单编号：{{$v->order_number}}</div>
                    </div>
                    <div class="col-md-4 col-md-offset-2">
                        <div>
                            <span>订单总价：￥{{$v->total_amonut}}</span>
                        </div>
                        <div>
                            <span>订单状态：未支付</span>
                        </div>
                        <div>
                            <span>订单时间：{{$v->order_at}}</span>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection