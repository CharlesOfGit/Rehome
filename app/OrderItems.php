<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    protected $table    = "order_items";
    protected $fillable = ['orderid', 'productid', 'buynum', 'price', 'rating', 'review', 'reviewed_at'];
    public $timestamps  = false;
    public function order()
    {
        return $this->belongsTo(Orders::class);
    }
}
