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
}
