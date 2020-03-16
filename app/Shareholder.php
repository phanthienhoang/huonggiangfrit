<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shareholder extends Model
{
    public function category_Shareholder()
    {
        return $this->belongsTo('App\Category_Shareholder', 'category_id');
    }
    public function Shareholder_Translates()
    {
        return $this->hasMany(Shareholder_Tran::class);
    }

}
