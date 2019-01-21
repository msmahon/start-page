<?php



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/my-pages', 'PageController@index')->name('my-pages');
Route::get('/page/{slug}', 'PageController@showPage');
Route::get('/page/delete/{slug}', 'PageController@destroy');
