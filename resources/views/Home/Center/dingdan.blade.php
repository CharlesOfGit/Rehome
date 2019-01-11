@extends('Home.public.center')
@section('title',"用户订单")
@section('main')
<div id="globalBigRight">
    <div class="tab_box">
        <div class="globalModule">
            <div class="tab_title"><h3>我的订单</h3>
            </div>
            <div class="globalModuleContent">
                <table cellspacing="0" class="tableList">
                    <tr>
                        <th>订单号</th>
                        <th>下单时间</th>
                        <th>订单总金额</th>
                        <th>订单状态</th>
                        <th>操作</th>
                    </tr>
                    <tr>
                        <td>
                            <li><a href="../user.php?act=order_detail&order_id=45">2012080607034</a>
                        </td>
                        <td>2012-08-06 14:13:04</td>
                        <td>￥11112115.00元</td>
                        <td>未确认,未付款,未发货</td>
                        <td>
                            <li><a href="../user.php?act=cancel_order&order_id=45" onclick="if (!confirm('您确认要取消该订单吗？取消后此订单将视为无效订单')) return false;">取消订单</a>
                        </td>
                    </tr>
                </table>
                <div class="blank"></div>
                <form name="selectPageForm" action="/user.php" method="get">
                    <div id="pager">
                    </div>
                </form>
                <script type="Text/Javascript" language="JavaScript">
                    <!--

function selectPage(sel)
{
  sel.form.submit();
}

//-->
</script>
            </div>
        </div>
        <div class="globalModule">
            <div class="tab_title"><h3>合并订单</h3>
            </div>
            <div class="globalModuleContent">
                <script type="text/javascript">
                //<![CDATA[
                var from_order_empty = "请选择要合并的从订单";
                var to_order_empty = "请选择要合并的主订单";
                var order_same = "主订单和从订单相同，请重新选择";
                var confirm_merge = "您确实要合并这两个订单吗？";
                //]]>
                </script>
                <form action="user.php" method="post" name="formOrder" onsubmit="return mergeOrder()">
                    <table cellspacing="0" class="tableList">
                        <tr>
                            <td>主订单：</td>
                            <td>
                                <select name="to_order">
                                    <option value="0">请选择...</option>
                                    <option value="2012080607034">2012080607034</option>
                                </select>
                            </td>
                            <td>从订单：</td>
                            <td>
                                <select name="from_order">
                                    <option value="0">请选择...</option>
                                    <option value="2012080607034">2012080607034</option>
                                </select>
                            </td>
                            <td>
                                <input name="act" value="merge_order" type="hidden" />
                                <input type="submit" name="Submit" value="合并订单" />
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td colspan="4" class="textStrong">订单合并是在发货前将相同状态的订单合并成一新的订单。<br />收货地址，送货方式等以主定单为准。</td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection