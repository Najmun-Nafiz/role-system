<?php

use Illuminate\Support\Facades\Route;

//All controller path here...
use userRoles\RoleController;
use userRoles\UserController;



Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::group(['prefix'=>'dashboard','middleware' => ['auth']], function() {
    Route::Resource('roles', RoleController::class);
    Route::Resource('users', UserController::class);
});