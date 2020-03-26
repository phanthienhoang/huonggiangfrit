<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

class Category_product extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $table = 'category_products';
    protected $foreignKey = 'category_id';

    public function product()
    {
        return $this->hasMany('App\Product', $this->foreignKey);
    }


    public function category_product_tran()
    {
        return $this->hasMany('App\Category_product_tran', $this->foreignKey);
    }

}
