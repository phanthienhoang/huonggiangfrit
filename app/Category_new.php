<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category_new extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $table = 'category_news';
    protected $foreignKey = 'category_id';

    public static function boot(){
        parent::boot();

        static::deleting(function ($category_new){
            foreach ($category_new->category_new_tran as $cate){
                $cate->delete();
            }
        });
    }

    public function new(){
        return $this->hasMany('App\New');
    }

    public function category_new_tran(){
        return $this->hasMany('App\Category_new_tran', $this->foreignKey);
    }
}
