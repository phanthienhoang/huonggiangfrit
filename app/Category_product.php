<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category_product extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $table = 'category_products';

    public function product(){
        return $this->hasMany('App\Product');
    }

    public function category_product_tran(){
        return $this->hasMany('App\Category_product_tran');
    }
}
