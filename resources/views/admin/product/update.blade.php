@extends('admin.public.base')
@section('title',"商品修改")
@section('main')
<form action="{{url('product/usave')}}" method="post">
    <table width="100%">
        <tr>
            <td>标题：</td>
            <td><input value="{{$product->title}}" type="text" name="title" /></td>
            <td></td>
        </tr>
        <tr>
            <td>产品图片：</td>
            <td>
                <table width="100%">
                    @foreach($imageCols as $v)
                    <tr id="t_{{$v->id}}">
                        <td width="110">
                            <img src="{{asset('uploads')}}/{{$v->path}}" width="100"/>
                        </td>
                        <td><a href="javascript:void(0);" onclick="delImage({{$v->id}})">删除</a></td>
                    </tr>
                    @endforeach
                </table>
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
            <td>会员价格：</td>
            <td>
                <input value="{{$product->userprice}}" type="text" name="userprice" />
            </td>
            <td></td>
        </tr>
        <tr>
            <td>市场价格：</td>
            <td>
                <input value="{{$product->price}}" type="text" name="price" />
            </td>
            <td></td>
        </tr>
        <tr>
            <td>优惠数量：</td>
            <td>
                <input value="{{$product->salenum}}" type="text" name="salenum" />
            </td>
            <td></td>
        </tr>
        <tr>
            <td>优惠价格：</td>
            <td>
                <input type="text" value="{{$product->saleprice}}" name="saleprice" />
            </td>
            <td></td>
        </tr>
        <tr>
            <td>库存数：</td>
            <td>
                <input value="{{$product->libnum}}" type="text" name="libnum" />
            </td>
            <td></td>
        </tr>
        <tr>
            <td>产品介绍：</td>
            <td>
                <textarea name="content">{{$product->content}}</textarea>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>规格参数：</td>
            <td>
                <textarea name="style">{{$product->style}}</textarea>
            </td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$product->id}}">
                <input type="submit" value="提交" />
                <input type="button" name="Submit" onclick="javascript:history.back(-1);" value="返回">
            </td>
        </tr>
    </table>
</form>
<script type="text/javascript">
$("[name='typestr']").val("{!!$product->typestr!!}");
$("[name='brandid']").val("{!!$product->brandid!!}");

function delImage(id) {
    $.ajax({
        url: '{{url("product/delimage")}}',
        data: "id=" + id,
        dataType: 'json',
        success: function(re) {
            //根据id，删除对应tr
            if (re.result == 'success') {
                $("#t_" + id).remove();
            } else {
                alert(re.msg);
            }
        }
    });
}

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
