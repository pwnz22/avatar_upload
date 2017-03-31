<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::post('/account/avatar', 'Account\AvatarController@store')->name('account.avatar.store');

Route::patch('/account', 'Account\AccountController@update')->name('account.update');
