<?php



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/pages', 'PageController@index')->name('my-pages');
Route::get('/pages/create', 'PageController@create')->middleware('auth');
Route::get('/pages/{slug}', 'PageController@show');
Route::get('/pages/delete/{slug}', 'PageController@destroy')->middleware('auth');
Route::post('/pages', 'PageController@store')->middleware('auth');