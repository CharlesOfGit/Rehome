@extends('Home.public.center')
@section('title', "我的购物车")
@section('main')
<h3> 我的购物车 </h3>
<div class="flowBox">
    <form id="formCart" name="formCart" method="post" action="{{url('cart/update')}}">
        <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#aacded">
            <tr>
                <th colspan="2">商品</th>
                <th>单价</th>
                <th>数量</th>
                <th>小计</th>
                <th>操作</th>
            </tr>
            @foreach($cartlist as $v)
            <tr id="tr-{{$v->productid}}">
                <td>{{$v->title}}</td>
                <td>
                    <img style="width:80px; height:80px;" src="{{asset('uploads')}}/{{$v->path}}" title="图片">
                </td>
                <td><span id="p-{{$v->productid}}">{{$v->price}}</span>元</td>
                <td>
                    {{csrf_field()}}
                    <input type="text" id="product-{{$v->productid}}" name="number" value="{{$v->buynum}}" size="4" class="inputBg" style="text-align:center" onblur="changeNum({{$v->productid}},this.value)">
                </td>
                <td><span id="total-{{$v->productid}}"> {{$v->price*$v->buynum}}</span>元</td>
                <td><a href="">删除</a></td>
            </tr>
            <input type="hidden" name="" value="{{$total += $v->price*$v->buynum}}">
            @endforeach
        </table>
        <script>
            function changeNum(productid,num){
            var url = "{{url('center/cartchangeNum')}}";
            var data = { 
                'productid': productid, 
                'num': num,
                "_token": $('input[name=_token]').val(),
            };
            var success = function(response)
            {
                if (response.errno == 1) {
                                var price = ($("#product-" + productid).val()) * ($("#p-" + productid).html());
                                $("#total-" + productid).html(price);
                            }
            }
            $.post(url, data, success, "json");
        }
         function delPro(productid) {
                //通过ajax将商品的id传递给PHP脚本进行数据表的删除
                var url = "deleteProduct.php";
                var data = { "productid": productid };
                var success = function(response) {
                    if (response.errno == 0) {
                        $("#tr-" + productid).remove();
                    }
                }
                $.get(url, data, success, "json");
        }
        </script>
        <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
            <tbody>
                <tr>
                    <td bgcolor="#ffffff">
                        总金额
                        {{$total}}
                        元
                    </td>
                    <td align="right" bgcolor="#ffffff">
                        <input type="button" value="清空购物车" class="bnt_blue_1" onclick="clearCart()">
                        <script type="text/javascript">
                        function clearCart() {
                            var url = "clear.php";
                            var success = function(response) {
                                if (response.errno == 0) {
                                    $(".products").remove();
                                }
                            }
                            $.get(url, success, 'json');
                        }
                        </script>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
@endsection