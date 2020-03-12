<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_trans extends Model
{
    protected $guarded = [];
    protected $table = 'product_trans';
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
