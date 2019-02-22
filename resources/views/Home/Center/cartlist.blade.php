@extends('Home.public.center')
@section('title', "我的购物车")
@section('main')
<h3> 我的购物车 </h3>
<form method="post" action="{{url('settlement')}}">
    <table class="table">
        <tr>
            <th><input type="checkbox" onclick="selectAll(this)" id="allCheck">
                <label for="allCheck">全选</label>
            </th>
            <th colspan="2">商品</th>
            <th>单价</th>
            <th>数量</th>
            <th>小计</th>
            <th>操作</th>
        </tr>
        @foreach($cartlist as $v)
        <tr id="tr-{{$v->productid}}" class="products">
            <td><input type="checkbox" name="cartid_{{$v->productid}}" value="{{$v->id}}" class="itemSelect"></td>
            <td>{{$v->title}}</td>
            <td>
                <img style="width:80px; height:80px;" src="{{ asset('uploads') }}/{{$v->path}}" title="图片">
                </td>
            <td><span id="p-{{$v->productid}}">{{$v->price}}</span>元</td>
            <td>
                <input type="text" id="product-{{$v->productid}}" name="number" value="{{$v->buynum}}" autocomplete="off" autocomplete="off" size="4" style="text-align:center" onblur="changeNum({{$v->productid}},this.value)">
            </td>
            <td><span id="total-{{$v->productid}}" class="total-{{$v->productid}}">{{$v->price*$v->buynum}}</span>元</td>
            <td>
                <a href="javascript:void(0);" onclick="delPro({{$v->productid}})">删除</a>
            </td>
        </tr>
        {{csrf_field()}}
        @endforeach
    </table>
    <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
        <tbody>
            <tr>
                <td align="right" bgcolor="#ffffff">
                    <input class="btn btn-danger btn-disfavor" type="button" value="清空购物车" onclick="clearCart()">
                    <input class="btn btn-primary" type="submit" value="去结算">
                </td>
            </tr>
        </tbody>
    </table>
    <script>
    function selectAll(selectAll) {
        $(".itemSelect").prop("checked", $(selectAll).prop("checked"));
    }
    </script>
    <script>
    function changeNum(productid, num) {
        var url = "{{url('center/cartchangeNum')}}";
        var data = {
            'productid': productid,
            'num': num,
            "_token": $('input[name=_token]').val(),
        };
        var success = function(response) {
            if (response.errno == 1) {
                var price = ($("#product-" + productid).val()) * ($("#p-" + productid).html());
                $("#total-" + productid).html(price);

            }
        }
        $.post(url, data, success, "json");
    }

    function delPro(productid) {
        var url = "{{url('center/delPro')}}";
        var data = { "productid": productid };
        var success = function(response) {
            if (response.errno == 1) {
                $("#tr-" + productid).remove();
            }
        }
        $.get(url, data, success, "json");
    }

    function clearCart() {
        var url = "{{url('center/clearPro')}}";
        var success = function(response) {
            if (response.errno == 1) {
                $(".products").remove();
            }
        }
        $.get(url, success, 'json');
    }
    </script>
</form>
@endsection