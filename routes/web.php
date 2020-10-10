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
Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],function(){

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify'=> true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/test', 'Test@index');
Route::view('about', "about",[
    'page_name' => "Contact me Page"
]);
Route::get('category/{id}', function ($id) {
    $sections = array(
        '1' => 'happy',
        '2' => 'sad'
    );
    return view("category",[
        'the_id' => $sections[$id] ?? "not found id"
    ]);
});

Route::resource('news', 'Test');
});
