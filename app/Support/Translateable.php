<?php

namespace App\Support;

use Illuminate\Support\Facades\Config;

trait Translateable
{
    protected static function boot()
    {
        parent::boot();

        static::saved(function($model){
            $languages = Config::get('languages.supported');

            foreach ($languages as $language){
                $model->translation()->create(['locale' => $language]);
            }
        });
    }
}
