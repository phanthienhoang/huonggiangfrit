<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class New_tran extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $table = 'new_trans';
    protected $fillable = ['name', 'description','content', 'locale', 'image', 'new_id'];
    public function new()
    {
        return $this->belongsTo('App\News');
    }
}
