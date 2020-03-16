<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

class Category_product extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $table = 'category_products';
    protected $foreignKey = 'category_id';

    public function product()
    {
        return $this->hasMany('App\Product');
    }

    // public static function boot()
    // {
    //     parent::boot();

    //     static::deleting(function ($category_product) {
    //         foreach ($category_product->category_product_tran as $cate) {
    //             $cate->delete();
    //         }
    //     });

    //     static::created(function ($category_product) {
    //         $languages = Config::get('languages.supported');
    //         foreach ($languages as $language) {
    //             $category_product->translation()->create(['locale' => $language]);
    //         }
    //     });
    // }

    public function category_product_tran()
    {
        return $this->hasMany('App\Category_product_tran', $this->foreignKey);
    }

    // public function translation($language = null)
    // {
    //     if ($language === null) {
    //         $language = App::getLocale();
    //     }

    //     return $this->hasMany(Category_product_tran::class, $this->foreignKey)->where('locale', $language);
    // }
}
