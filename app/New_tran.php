<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class New_tran extends Model
{
    protected $guarded = [];
    protected $table = 'new_trans';
    public function news()
    {
        return $this->belongsTo('App\News');
    }
}
