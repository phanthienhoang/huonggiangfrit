<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product_trans extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $table = 'product_trans';

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function category_product_tran()
    {
        return $this->hasOneThrough(
            Category_product_tran::class,
            Product::class,
            'product_id',
            'category_id',
            'id',
            'category_id'
        );
    }
}
