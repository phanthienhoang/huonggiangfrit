<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shareholder_Tran extends Model
{   
    use SoftDeletes;

    protected $guarded = [];
    protected $table = 'shareholder__trans';
    protected $fillable=['title','images','contents','status','locale','shareholder_id'];

    public function shareholder()
    {
        return $this->belongsTo('App\Shareholder');
    }
}
