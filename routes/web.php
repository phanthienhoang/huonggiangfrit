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


Route::get('/contact', function () {
    return view('front_end.contact');
})->middleware('locale');

Auth::routes();

Route::prefix('/admin')->group(function () {
    Route::get('/', function () {
        return redirect('/admin/dashboard');
    })->name('admin.login')->middleware("auth");

    Route::get('dashboard', 'HomeController@index')->name('admin.dashboard');
    Route::get('products/categories', 'ProductController@getCategory')->name('admin.getCategory');
    Route::get('products/get-deleted', 'ProductController@getDeleted')->name('admin.products.getDeleted')->middleware('locale');
    Route::get('products/restore/{id}', 'ProductController@restore')->name('admin.products.restore');
    Route::delete('products/force-delete/{id}', 'ProductController@forceDelete')->name('admin.products.forceDelete')->middleware('locale');

    Route::resource('products', 'ProductController')->middleware('locale');


    Route::resource('new', 'NewController')->middleware('locale');
    // Route::get('new_deleted', 'NewController@show_deletad_at')->name('admin.new.deleted_at')->middleware('locale');
    // Route::get('new_restore/{id}', 'NewController@restore')->name('admin.new.restore')->middleware('locale');
    // Route::get('new_view/{id}', 'NewController@view_deleted_at')->name('admin.new.view_deleted_at')->middleware('locale');
    // Route::delete('new_forceDelete/{id}', 'NewController@forceDelete')->name('admin.new.forceDelete')->middleware('locale');


// =======================================================================================================================>>>
// =======================================================================================================================>>>

    Route::get('shareholder/categories', 'Category_ShareHolder\ShareHolderController@getShareholderCategory')->name('admin.getShareholderCategory');

    Route::get('category-products/get-deleted', 'Category_Product\CategoryController@getDeleted')->name('admin.category-products.getDelete')->middleware('locale');
    Route::get('category-products/restore/{id}', 'Category_Product\CategoryController@restore')->name('admin.category-products.restore')->middleware('locale');
    Route::delete('category-products/force-delete/{id}', 'Category_Product\CategoryController@forceDelete')->name('admin.category-products.forceDelete')->middleware('locale');

    Route::resource('category-products', 'Category_Product\CategoryController')->middleware('locale');
    Route::resource('category-shareholder', 'Category_ShareHolder\CateShareHolderController')->middleware('locale');
    Route::resource('shareholder', 'Category_ShareHolder\ShareHolderController')->middleware('locale');
    Route::resource('tuyendung', 'HireController')->middleware('locale');

});


Route::get('change-language/{language}', 'Front_End\HomeController@changeLanguage')
->name('user.change-language')->middleware('locale');

Route::get('change-language-front/{language}', 'Front_End\HomeController@changeLanguageFront')
->name('user.change-language-front')->middleware('locale');

Route::get('/about','Front_End\HomeController@indexAbout')->name('about.web')->middleware('locale');

Route::get('/product/{category_product_tran:slug}','Front_End\HomeController@showCategory')->name('category.web')->middleware('locale');
Route::get('/product/{id}','Front_End\HomeController@show')->name('product.detail')->middleware('locale');



Route::post('/contact', 'Front_End\SendMailController@send')->name('mail.contact');
Route::get('product_trans/{product_trans}', 'Front_End\HomeController@readMore')->name('product.readmore');

Route::get('/hiring','Front_End\HingringController@viewHires')->name('hiring.web')->middleware('locale');

Route::get('news','Front_End\HingringController@viewNews')->name('news.web')->middleware('locale');
