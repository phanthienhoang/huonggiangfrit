<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('front_end.home');
});

Auth::routes();

Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('/', function () {
        if (Auth::user()) {
            return redirect('admin/dashboard');
        }
        return view('auth.login');
    })->name('login');

    Route::get('dashboard', 'HomeController@index')->name('dashboard');

    Route::resource('shareholders', 'ShareHoldersController');

});


// Route::get('adminlte',function(){
//     return view('back_end.dashboard');
// });
Route::get('/admin', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
