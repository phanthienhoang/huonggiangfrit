<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $table = 'products';

    public function category_product()
    {
        return $this->belongsTo('App\Category_product');
    }

    public function product_trans()
    {
        return $this->hasMany('App\Product_trans');
    }
}
