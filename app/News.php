<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class News extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $table = 'news';

    public function category_new()
    {
        return $this->belongsTo('App\Category_new');
    }

    public function new_trans()
    {
        return $this->hasMany('App\New_trans');
    }
}
