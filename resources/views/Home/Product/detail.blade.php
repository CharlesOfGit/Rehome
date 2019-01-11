@extends('Home.public.base')
@section('title',"商品详情")
@section('main')
<div class="container">
    <form>
        <div id="demo1">
            <ul>
                @foreach($images as $v)
                <li>
                    <a  href="{{asset('uploads')}}/{{$v->path}}" rel="zoom1" rev="{{asset('uploads')}}/{{$v->path}}" title="">
        <img src="{{asset('uploads')}}/{{$v->path}}" alt="{{$product->title}}" class="B_red" /></a>
                </li>
                @endforeach
            </ul>
        </div>
        <ul class="line">
            <li>市 场 价：<span class="marketPrice">￥{{$product->price}}元</span></li>
            <li>商品库存： {{$product->libnum}}</li>
            <li>购买数量：
                <input name="number" type="text" id="number" value="0" size="4" />
            </li>
        </ul>
        <ul>
            <ul>
                <li id="itemBtnList">
                    {{csrf_field()}}
                    <a class="btn btn-default" href="javascript:addCatr({{$product->id}})"><span class="glyphicon glyphicon-shopping-cart"></span>加入购物车</a>
                    <button class="btn btn-default"><span class="glyphicon glyphicon-star"></span>收藏</button>
                </li>
            </ul>
        </ul>
    </form>
    <div id="div1"></div>
</div>
<script type="text/javascript">
function addCatr(productid) {
    var url = "{{url('cart/add')}}";
    var data = {
        "productid": productid,
        "number": parseInt($("#number").val()),
        "_token": $('input[name=_token]').val(),
    };
    var success = function(re) {
        if (re.result == 'success') {
            alert(re.msg);
        } else {
            alert(re.msg);
        }

    }

    $.post(url, data, success, "json", "_token");
}
</script>
@endsection