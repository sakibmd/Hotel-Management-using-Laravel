<?php

Route::get('/', 'HomeController@home')->name('home');
Route::get('/about', 'HomeController@about')->name('about');

Route::resource('/rooms','RoomController');
Route::resource('/available','AvailableRoom');
Route::resource('/clients','ClientController');
Route::resource('/currentClients','currentClientsController');