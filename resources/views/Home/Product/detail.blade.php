@extends('Home.public.base')
@section('title',"商品详情")
@section('main')
<div class="container">
    <div class="row">
        <div class="col-md-5">
            @foreach($images as $v)
            <img src="{{asset('uploads')}}/{{$v->path}}" class="col-md-12" alt="{{$product->title}}" />
                @endforeach
            </div>
            <div class="col-md-7">
                <div style="margin: 100px;"></div>
                <div><h1>{{$product->title}}</h1>
                    <div>价格：<span class="marketPrice">￥{{$product->price}}元</span></div>
                    <div>商品库存： {{$product->libnum}}</div>
                    <div>购买数量：<input name="number" type="text" id="number" value="1" size="4" autocomplete="off" /></div>
                </div>
                <div style="margin: 60px;"></div>
                <div>
                    {{csrf_field()}}
                    @if($collectListid)
                    <a href="javascript:delPro({{$product->id}})" class="btn btn-danger btn-disfavor">取消收藏</a>
                    @else
                    <a href="javascript:addCollect({{$product->id}})"  class="btn btn-success btn-favor">❤ 收藏</a>
                    @endif
                    <a class="btn btn-primary" href="javascript:addCatr({{$product->id}})"><span class="glyphicon glyphicon-shopping-cart"></span>加入购物车</a>
                </div>
            </div>
        </div>
    </div>
    <div class="product-detail" style="margin:15px;">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" href="#product-detail-tab" aria-controls="product-detail-tab" role="tab" data-toggle="tab" aria-selected="true">商品详情</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#product-reviews-tab" aria-controls="product-reviews-tab" role="tab" data-toggle="tab" aria-selected="false">用户评价</a>
            </li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="product-detail-tab">
                {{$product->content}}</div>
            <div role="tabpanel" class="tab-pane" id="product-reviews-tab">
                未完成 </div>
        </div>
    </div>
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
            Swal.fire({
                position: 'center',
                type: 'success',
                title: re.msg,
                showConfirmButton: false,
                timer: 1500
            }).then(function() { // 这里加了一个 then() 方法
                location.reload();
            });
        } else {
            Swal.fire({
                position: 'center',
                type: 'success',
                title: re.msg,
                showConfirmButton: false,
                timer: 1500
            }).then(function() { // 这里加了一个 then() 方法
                location.reload();
            });
        }
    }
    $.post(url, data, success, "json", "_token");
}

function addCollect(productid) {
    var url = "{{url('collect/add')}}";
    var data = {
        "productid": productid,
        "_token": $('input[name=_token]').val(),
    };
    var success = function(re) {
        if (re.result == 'success') {
            Swal.fire({
                position: 'center',
                type: 'success',
                title: re.msg,
                showConfirmButton: false,
                timer: 1500
            }).then(function() { // 这里加了一个 then() 方法
                location.reload();
            });
        } else {
            Swal.fire({
                position: 'center',
                type: 'success',
                title: re.msg,
                showConfirmButton: false,
                timer: 1500
            }).then(function() { // 这里加了一个 then() 方法
                location.reload();
            });
        }
    }
    $.post(url, data, success, "json", "_token");

}

function delPro(productid) {
    var url = "{{url('collect/delPro')}}";
    var data = { "productid": productid };
    var success = function(response) {
        if (response.errno == 1) {
            window.location.reload();
        }
    }
    $.get(url, data, success, "json");
}
</script>
@endsection