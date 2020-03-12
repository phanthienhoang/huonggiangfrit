<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category_new extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $table = 'category_news';

    public function new(){
        return $this->hasMany('App\New');
    }

    public function category_new_tran(){
        return $this->hasMany('App\Category_new_tran');
    }
}
