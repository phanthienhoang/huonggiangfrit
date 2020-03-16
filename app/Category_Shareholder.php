<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category_Shareholder extends Model
{
    use SoftDeletes;
    
    protected $guarded = [];
    protected $table = 'category__shareholders';
    protected $foreignKey = 'category_id';

    public function category_shareholder_tran()
    {
        return $this->hasMany('App\Category_Shareholder_Tran', $this->foreignKey);
    }
}
