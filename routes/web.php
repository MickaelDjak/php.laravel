<?php

Route::get('/', 'HomeController@home')->name('home');
Route::get('/contacts', 'HomeController@contact')->name('contacts');
Route::resource('/posts', 'PostController');