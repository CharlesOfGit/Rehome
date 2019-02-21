<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 *
 */
class ProductCollect extends Model
{
    protected $table   = "product_collect";
    public $timestamps = true;
    const CREATED_AT   = 'addtime';
    const UPDATED_AT   = 'updatetime';
}
