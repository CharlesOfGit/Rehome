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
                        <th width="200">商品名称</th>
                        <th width="120">价格</th>
                        <th width="150">操作</th>
                    </tr>
                    <tr>
                        <td>
                            <li><a href="../goods.php?id=4779">产品20</a>
                        </td>
                        <td>
                            美智价：<span class="goodsPrice">￥999元</span>
                        </td>
                        <td>
                            <span class="btnBlue"><li><a href="../javascript:if (confirm('确定将此商品加入关注列表么？')) location.href='user.php?act=add_to_attention&amp;rec_id=2'">关注</a></span>
                            <span class="btnBlue"><li><a href="../javascript:addToCart(4779)">加入购物车</a></span> <span class="btnBlue"><li><a href="../javascript:if (confirm('您确定要从收藏夹中删除选定的商品吗？')) location.href='user.php?act=delete_collection&amp;collection_id=2'">删除</a></span>
                        </td>
                    </tr>
                </table>
                <div class="blank"></div>
                <form name="selectPageForm" action="/user.php" method="get">
                    <div id="pager">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection