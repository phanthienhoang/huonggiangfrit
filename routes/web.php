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
    if (App::getLocale() == "vi") {
    $new_trans = App\New_tran::where('locale','vi')->orderBy('created_at', 'desc')->take(2)->get();
    } else {
        $new_trans = App\New_tran::where('locale','en')->orderBy('created_at', 'desc')->take(2)->get();
    }
    return view('front_end.home',compact('new_trans'));
})->middleware('locale');

// Route::get('/category', function () {
//     return view('front_end.productlist');
// })->middleware('locale');

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

    Route::resource('category_new', 'Category_newController')->middleware('locale');
    Route::get('category_new_deleted', 'Category_newController@show_deletad_at')->name('category_new.deleted_at')->middleware('locale');
    Route::get('category_new_restore/{id}', 'Category_newController@restore')->name('category_new.restore')->middleware('locale');
    Route::get('category_new_view/{id}', 'Category_newController@view_deleted_at')->name('category_new.view_deleted_at')->middleware('locale');
    Route::delete('category_new_forceDelete/{id}', 'Category_newController@forceDelete')->name('category_new.forceDelete')->middleware('locale');

    Route::resource('new', 'NewController')->middleware('locale');
    Route::get('new_deleted', 'NewController@show_deletad_at')->name('new.deleted_at')->middleware('locale');
    Route::get('new_restore/{id}', 'NewController@restore')->name('new.restore')->middleware('locale');
    Route::get('new_view/{id}', 'NewController@view_deleted_at')->name('new.view_deleted_at')->middleware('locale');
    Route::delete('new_forceDelete/{id}', 'NewController@forceDelete')->name('new.forceDelete')->middleware('locale');


// =======================================================================================================================>>>
// =======================================================================================================================>>>

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
Route::get('/sanpham/{category_product_tran}','Front_End\HomeController@showCategory')->name('category.web')->middleware('locale');
Route::get('/tintuc/{id}','Front_End\HomeController@showNew')->name('category.web.new')->middleware('locale');
Route::get('/tintuc/{id}/show','Front_End\HomeController@showNewList')->name('category.web.new.show')->middleware('locale');

Route::post('/contact', 'Front_End\SendMailController@send')->name('mail.contact');

