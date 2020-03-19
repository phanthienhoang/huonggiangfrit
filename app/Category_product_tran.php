<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category_product_tran extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $table = 'category_product_trans';
    protected $fillable=['name','images','description','contents','locale','category_id','status'];

    public function category_product()
    {
        return $this->belongsTo('App\Category_product');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function product_trans()
    {
        return $this->hasManyThrough(Product_trans::class, Product::class, 'category_id', 'product_id', 'id', 'id');
    }

}
