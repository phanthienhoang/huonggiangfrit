<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_new_tran extends Model
{
    protected $guarded = [];
    protected $table = 'category_new_trans';
    public function category_new()
    {
        return $this->belongsTo('App\Category_new');
    }
}
