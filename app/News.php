<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

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
        return $this->hasMany('App\New_tran');
    }

    public function newTranslates()
    {

        return $this->hasMany(New_tran::class);

    }

    public function translation($language = null)
    {
        if ($language === null) {
            $language = App::getLocale();
        }
        return $this->hasMany(New_tran::class)->where('locale', $language);
    }
}
