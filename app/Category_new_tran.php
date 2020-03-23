<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category_new_tran extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $table = 'category_new_trans';
    protected $fillable=['name','status','locale','slug','category_id'];
    public function category_new()
    {
        return $this->belongsTo('App\Category_new');
    }
}
