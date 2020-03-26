<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

class News extends Model
{

    protected $table = 'news';

    public function new_trans()
    {
        return $this->hasMany('App\New_tran');
    }

}
