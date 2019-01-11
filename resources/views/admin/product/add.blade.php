@extends('admin.public.base')
@section('title',"添加商品")
@section('main')
<form action="{{url('product/save')}}" method="post" enctype="multipart/form-data">
    <table width="100%">
        <tr>
            <td>标题：</td>
            <td><input type="text" name="title" autocomplete="off"/></td>
            <td></td>
        </tr>
        <tr>
            <td>产品图片：</td>
            <td>
                <input type="file" name='upload[]' multiple='multiple' />
            </td>
            <td></td>
        </tr>
        <tr>
            <td>分类：</td>
            <td>
                <select name="typestr" onchange="changeBrand();">
                    @foreach($arr as $v)
                    <option value="{!!$v['fstr']!!}>{{$v['id']}}>">{{$v['tname']}}</option>
                    @endforeach
                </select>
            </td>
            <td></td>
        </tr>
        <tr>
        <tr>
            <td>会员价格：</td>
            <td>
                <input type="text" name="userprice" autocomplete="off" />
            </td>
            <td></td>
        </tr>
        <tr>
            <td>市场价格：</td>
            <td>
                <input type="text" name="price"  autocomplete="off" />
            </td>
            <td></td>
        </tr>
        <tr>
            <td>优惠数量：</td>
            <td>
                <input type="text" name="salenum" autocomplete="off" />
            </td>
            <td></td>
        </tr>
        <tr>
            <td>优惠价格：</td>
            <td>
                <input type="text" name="saleprice" autocomplete="off" />
            </td>
            <td></td>
        </tr>
        <tr>
            <td>库存数：</td>
            <td>
                <input type="text" name="libnum" autocomplete="off" />
            </td>
            <td></td>
        </tr>
        <tr>
            <td>产品介绍：</td>
            <td>
                <textarea name="content" autocomplete="off" ></textarea>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>规格参数：</td>
            <td>
                <textarea name="style" autocomplete="off" ></textarea>
            </td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3">
                {{csrf_field()}}
                <input type="submit" value="提交" />
                <input type="button" name="Submit" onclick="javascript:history.back(-1);" value="返回">
            </td>
        </tr>
    </table>
</form>
<script type="text/javascript">
function changeBrand() {
    //获取一级分类id
    var typestr = $("[name='typestr']").val();
    //获取第一个id值
    var arr = typestr.match(/^>(\d+)>/);
    var typepid = arr[1];
    //启动ajax
    $.ajax({
        url: '{{url("admin/product/getbrand")}}',
        data: 'typepid=' + typepid,
        type: 'get',
        dataType: 'json',
        success: function(re) {
            console.log(re);
            //删除brandid
            $("[name='brandid']").empty();
            if (re.result == 'success') {
                //根据data中记录的个数，追加option
                for (var k in re.data) {
                    $("[name='brandid']").append("<option value='" + re.data[k].id + "'>" + re.data[k].bname + "</option>");

                }
            }
        },
        error: function() {
            console.log('error');
        }
    })
}
</script>
@endsection
