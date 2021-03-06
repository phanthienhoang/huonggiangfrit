<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category_product_tran;
use App\Product_trans;
use App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('front_end.partials.navbar', function ($view) {
            if (App::getLocale() == "en") {
                $loai_sp = Category_product_tran::where([
                    ['locale','=', 'en'],
                    ['status', '=', '1'],
                ])->get();
            } else {
                $loai_sp = Category_product_tran::where([
                    ['locale','=', 'vi'],
                    ['status', '=', '1'],
                ])->get();

            }
            $view->with(compact('loai_sp'));
        });

    }
}
