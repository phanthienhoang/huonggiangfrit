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

// use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('front_end.home');
})->middleware('locale');

Route::get('/category', function () {
    return view('front_end.productlist');
})->middleware('locale');

Route::get('/contact', function () {
    return view('front_end.contact');
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
    Route::get('products/get-deleted', 'ProductController@getDeleted')->name('products.getDeleted')->middleware('locale');
    Route::get('products/restore/{id}', 'ProductController@restore')->name('products.restore');
    Route::delete('products/force-delete/{id}', 'ProductController@forceDelete')->name('products.forceDelete')->middleware('locale');

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

    Route::get('category-products/get-deleted', 'Category_Product\CategoryController@getDeleted')->name('category-products.getDelete')->middleware('locale');
    Route::get('category-products/restore/{id}', 'Category_Product\CategoryController@restore')->name('category-products.restore')->middleware('locale');
    Route::delete('category-products/force-delete/{id}', 'Category_Product\CategoryController@forceDelete')->name('category-products.forceDelete')->middleware('locale');

    Route::resource('category-products', 'Category_Product\CategoryController')->middleware('locale');
    Route::resource('category-shareholder', 'Category_ShareHolder\CateShareHolderController')->middleware('locale');
    Route::resource('shareholder', 'Category_ShareHolder\ShareHolderController')->middleware('locale');





});


Route::get('change-language/{language}', 'Front_End\HomeController@changeLanguage')
->name('user.change-language')->middleware('locale');

Route::get('/about','Front_End\HomeController@indexAbout')->name('about.web')->middleware('locale');

Route::post('/contact', 'Front_End\SendMailController@send')->name('mail.contact');

