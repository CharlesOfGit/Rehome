<?php
namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Type;

class BaseController extends Controller
{
    public function __construct()
    {

        $htmlStr = $this->getTypeToStr();
        //获取一级分类，传给模板
        $headerTypeCols = Type::where('pid', 0)->where('status', '<', 9)->get();
        //获取购物车中商品的总数
        $cartArr = [];
        if (isset($_COOKIE['cart'])) {
            $cartArr = unserialize($_COOKIE['cart']);
        }
        $cartBuyNum = 0;
        foreach ($cartArr as $v) {
            $cartBuyNum += $v;
        }
        //分享给模板
        view()->share(['headerTypeCols' => $headerTypeCols, 'cartBuyNum' => $cartBuyNum, 'htmlStr' => $htmlStr]);
    }

    protected function getTypeToStr()
    {
        $cols1      = Type::where("pid", 0)->where('status', '<', 9)->get();
        $contentStr = "";
        foreach ($cols1 as $v1) {
            $contentStr .= "<li><a target=\"_blank\" href=\"" . url('product/lister', ['pid' => $v1->id]) . "\"> " . $v1->tname . '</a><div class="submenu"><div class="subleft">';
            // 找第二级
            $cols2 = Type::where('pid', $v1->id)->where('status', '<', 9)->get();
            foreach ($cols2 as $v2) {
                $contentStr .= '
                    <dl>
                    <dt><a target="_blank" href="' . url("product/lister", ['pid' => $v1->id . '>' . $v2->id]) . '">' . $v2->tname . '</a></dt>';
                //找第三级
                $cols3 = Type::where('pid', $v2->id)->where('status', '<', 9)->get();
                foreach ($cols3 as $v3) {
                    $contentStr .= "<dd><a href='" . url('product/lister', ['pid' => $v1->id . '>' . $v2->id . '>' . $v3->id]) . "'>" . $v3->tname . "</a></dd>";
                }
                $contentStr .= "</dl>";
            }
            $contentStr .= "</div></div></li>";
        }
        return $contentStr;
    }

}
