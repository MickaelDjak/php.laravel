<?php

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/contacts', 'HomeController@contact')->name('contacts');
Route::resource('/posts', 'PostController');
