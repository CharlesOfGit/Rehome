<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 *
 */
class Type extends Model
{
    protected $table   = "type";
    public $timestamps = false;
    public function getTypeAllToArray($pid = 0, $num = 0, $fstr = '')
    {
        $arr = [];
        //根据父id，找第一级，找到放在数组中
        $cols = $this->where('pid', $pid)
            ->where('status', '<', 9)
            ->get();
        $indentStr = str_repeat('--', $num);
        $num++;
        foreach ($cols as $v) {
            $arr[] = ['id' => $v->id, 'tname' => $indentStr . $v->tname, 'pid' => $v->pid, 'fstr' => $fstr];
            //找第二级
            $parentStr = $fstr . ">" . $v->id;
            $arrSon    = $this->getTypeAllToArray($v->id, $num, $parentStr);
            $arr       = array_merge($arr, $arrSon);
        }
        return $arr;
    }
}
