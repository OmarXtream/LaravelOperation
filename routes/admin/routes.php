<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "Admin" middleware group. Now create something great!
|
*/

// Main Routes
Route::group(['namespace' => 'Admin','prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'web','localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],function(){
    // Route::group(
    //     [
    //         'prefix' => LaravelLocalization::setLocale(),
    //         'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    //     ], function(){ //...
    //     });

   // Route::get('admin','LoginController@ShowInfo')->name("AdminLogin");


###### Start Admin Area


## Admin Login
Route::GET('AdminLogin','CustomeAuth@index')->name('AdminLogin');
Route::POST('CheckLogin','CustomeAuth@login')->name('login.admin');


Route::group(['prefix' => 'Admin','middleware' => ['Admin:admin,AdminLogin']],function(){

Route::GET('/',function(){
return view('admin.home');

});

## Key Controling
Route::get('create','KeysController@index')->name("KeysCreate");
Route::post('make','KeysController@store')->name("makeKey");
Route::get('edit/{id}','KeysController@show')->name("keyUpdate");
Route::post('update/{id}','KeysController@edit')->name("updateKey");
Route::get('delete/{id}','KeysController@destroy')->name("Key.Delete");
## Ajax Test
Route::get('ajax',function(){

    return view('admin.ajax');
})->name('ajax');
Route::POST('getInfo','KeysController@info')->name('getData');
});

###### End Admin Area



});
