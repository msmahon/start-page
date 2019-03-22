<?php



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/pages', 'PageController@index')->name('my-pages');
Route::get('/pages/{slug}', 'PageController@show');
Route::get('/pages/delete/{slug}', 'PageController@destroy');
Route::post('/pages', 'PageController@store');
Route::get('/pages/create', 'PageController@create');