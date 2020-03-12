<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_product_tran extends Model
{
    protected $guarded = [];
    protected $table = 'category_product_trans';
    public function category_product()
    {
        return $this->belongsTo('App\Category_product');
    }
}
