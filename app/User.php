<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function __construct($arr = [])
    {
        foreach ($arr as $k => $v) {
            $this->$k = $v;
        }
    }
    protected $table = "user";

    public $timestamps = true;

}
