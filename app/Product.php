<?php

namespace App;

use App\Support\Translateable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

class Product extends Model
{
    use Translateable;
    use SoftDeletes;

    protected $guarded = [];
    protected $table = 'products';

    public function category_product()
    {
        return $this->belongsTo('App\Category_product');
    }

    public function productTranslates()
    {
        return $this->hasMany(Product_trans::class);
    }

    public function translation($language = null)
    {
        if ($language === null) {
            $language = App::getLocale();
        }
        return $this->hasMany(Product_trans::class)->where('locale', $language);
    }
}
