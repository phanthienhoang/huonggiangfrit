<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\App;

Route::get('/', function () {
    return view('front_end.home');
})->middleware('locale');

Auth::routes();

Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('/', function () {
        if (Auth::user()) {
            return redirect('admin/dashboard');
        }
        return view('auth.login');
    })->name('login');

    Route::get('dashboard', 'HomeController@index')->name('dashboard');

    Route::get('products/categories', 'ProductController@getCategory')->name('getCategory');
    Route::resource('products', 'ProductController')->middleware('locale');
    Route::resource('category_new', 'Category_newController');


    
// =======================================================================================================================>>>
// =======================================================================================================================>>>


    // Route::get('category', 'Category_Product\CategoryController@index')->name('category')->middleware('locale');
    // Route::get('category/create', 'Category_Product\CategoryController@create')->name('category.create');
    // Route::post('category/create', 'Category_Product\CategoryController@store')->name('category.store');
    // Route::get('category/show/{id}', 'Category_Product\CategoryController@show')->name('category.show');
    // Route::get('category/edit/{id}', 'Category_Product\CategoryController@edit')->name('category.edit');
    // Route::put('category/update/{id}', 'Category_Product\CategoryController@update')->name('category.update');
    // Route::delete('category/destroy/{id}', 'Category_Product\CategoryController@destroy')->name('category.destroy');
    Route::get('shareholder/categories', 'Category_ShareHolder\ShareHolderController@getShareholderCategory')->name('getShareholderCategory');

    Route::resource('category-products', 'Category_Product\CategoryController')->middleware('locale');
    Route::resource('category-shareholder', 'Category_ShareHolder\CateShareHolderController')->middleware('locale');
    Route::resource('shareholder', 'Category_ShareHolder\ShareHolderController')->middleware('locale');
   


    

});

Route::get('/navbar', 'Front_End\HomeController@index')->middleware('locale');

Route::get('change-language/{language}', 'Front_End\HomeController@changeLanguage')
->name('user.change-language')->middleware('locale');


    

