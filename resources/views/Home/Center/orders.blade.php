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
                <td class="text-center">操作</td>
            </tr>
        </thead>
        @foreach($OrderItemsListArr as $Orders)
        <tr>
            <td colspan="6">
                <div>
                    <div class="col-md-6">
                        <div>订单编号：</div>
                    </div>
                    <div class="col-md-4 col-md-offset-2">
                        <div>
                            <span>订单时间：</span>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @foreach($Orders as $Items)
        <tr>
            @foreach($Items as $v)
            <td class="text-center">
                <div class="col-md-4">
                    <img style="width:80px; height:80px;" src="{{asset('uploads')}}/{{$v->path}}">
                </div>
                <div class="col-md-4">
                    <span class="text-center">{{$v->title}}</span>
                </div>
                <div class="col-md-4">
                    <span class="text-center">x{{$v->buynum}}</span>
                </div>
            </td>
            <td class="text-center">￥{{$v->price}}</td>
            <td class="text-center">订单详情</td>
            <td class="text-center"><a href="#">删除订单</a></td>
            @endforeach
        </tr>
        @endforeach
        <tr>
            <td colspan="6">
                <div>
                    <div class="col-md-6">
                        <div>
                            <div>收货地址：</div>
                        </div>
                        <div>订单备注：</div>
                    </div>
                    <div class="col-md-4 col-md-offset-2">
                        <div>
                            <span>订单总价：￥</span>
                        </div>
                        <div>
                            <span>订单状态：未支付</span>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
