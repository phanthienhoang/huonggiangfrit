<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category_Shareholder_Tran extends Model
{
    use SoftDeletes;
    
    protected $guarded = [];
    protected $table = 'category__shareholder__trans';
    protected $fillable=['title','locale','category_id','status'];
    public function category_shareholder()
    {
        return $this->belongsTo('App\Category_Shareholder');
    }
}
