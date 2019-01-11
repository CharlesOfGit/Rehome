<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table   = 'cart';
    public $timestamps = true;
    const CREATED_AT   = 'addtime';
    const UPDATED_AT   = 'updatetime';
}
