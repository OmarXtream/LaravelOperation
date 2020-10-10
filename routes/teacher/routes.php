<?php
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Teacher','prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'web','localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],function(){

    Route::GET('TeacherLogin','loginController@index')->name('TeacherLogin');
    Route::post('TeacherLogin','loginController@login')->name('teacher.CheckLogin');
Route::group(['prefix' => 'teacher','middleware' => ['Admin:teacher,TeacherLogin']],function(){

    Route::GET('/',function(){
    return view('teacher.home');

    });
    Route::GET('S3','S3Controller@ShowForm')->name('s3.form');
    Route::POST('S3','S3Controller@upload')->name('s3.upload');


});
});
