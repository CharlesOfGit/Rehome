@extends('Home.public.center')
@section('title',"用户收藏")
@section('main')
<div id="globalBigRight">
    <div class="tab_box">
        <div class="globalModule">
            <div class="tab_title"><h3>收藏商品</h3>
            </div>
            <div class="globalModuleContent">
                <table cellspacing="0" class="tableList">
                    <tr>
                        <th width="200" colspan="2">商品名称</th>
                        <th width="120">价格</th>
                        <th width="150">操作</th>
                    </tr>
                    @foreach($collectList as $v)
                    <tr id="tr-{{$v->productid}}">
                        <td>
                            <a href="../goods.php?id=4779">{{$v->title}}</a>
                        </td>
                        <td>
                            <img style="width:80px; height:80px;" src="{{ asset('uploads') }}/{{$v->path}}" title="图片">
                        </td>
                        <td>
                            价格：<span class="goodsPrice">￥{{$v->price}}元</span>
                        </td>
                        <td>
                            <span class="btnBlue"><li><a href="{{url('product/detail',$v->productid)}}">商品详情</a>
                            <li><a href="javascript:void(0);" onclick="delPro({{$v->productid}})">删除</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function delPro(productid) {
    var url = "{{url('collect/delPro')}}";
    var data = { "productid": productid };
    var success = function(response) {
        if (response.errno == 1) {
            $("#tr-" + productid).remove();
        }
    }
    $.get(url, data, success, "json");
}
</script>
@endsection