@extends('Home.public.center')
@section('title', "结算页")
@section('main')
<h3>结算页</h3>
<div class="table table-bordered">
    <table class="table">
        <tr>
            <td colspan="4" id="addressInfo">
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
            <td colspan="4">
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
        <tr>
            <td>商品名称</td>
            <td>单价</td>
            <td>数量</td>
            <td>小计</td>
        </tr>
    </table>
    <div>
        {{csrf_field()}}
        <button>返回购物车</button>
        <button>提交订单</button>
    </div>
</div>
@endsection