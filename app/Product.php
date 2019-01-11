<?php
namespace App;

use App\Productimage;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table   = "product";
    public $timestamps = true;
    const CREATED_AT   = 'addtime';
    const UPDATED_AT   = 'updatetime';
    /*
    根据商品id，读一个商品的图片
     */
    public function getImageById($id)
    {
        $result = Productimage::where("productid", $id)->first();
        if ($result) {
            return asset('upload') . "/" . $result->path;
        } else {
            return asset('images/no_picture.gif');
        }
    }
    /*
    通过id串转化成名称串
     */
    public function getIdstrToNamestr($idstr)
    {
        //逐个获取id，拿到id后，根据id获取名称，拼一个新的串（名称串）
        //去掉idstr首尾的>
        $idstr = trim($idstr, '>');
        //根据>把字符串拆分成数组
        $idArr = explode('>', $idstr);
        //遍历数组，逐个拿id
        $typeNameStr = "";
        foreach ($idArr as $id) {
            //根据id获取分类名称
            $type     = Type::where('id', $id)->first();
            $typename = $type->tname;
            $typeNameStr .= $typename . ">";
        }
        return '>' . $typeNameStr;
    }
}
