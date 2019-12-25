<?php

Route::get('/', 'IndexController@main')->name('main');
Route::get('/contacts', 'IndexController@contact')->name('contacts');
Route::resource('/posts', 'PostController');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
