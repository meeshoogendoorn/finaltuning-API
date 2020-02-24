<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/docs', function(){
    return view("docs");
})->name('docs');

Route::resource('users', 'UserController', ["except" => "destroy"]);
Route::resource('payments', 'PaymentController');


Route::get("/users/delete/{id}", "UserController@destroy")->name("user.delete");
Route::get("/users/update/payment/{id}/{status}", "UserController@updatePaymentStatus")->name("user.payment");
Route::get("/users/update/active/{id}/{status}", "UserController@updateActiveStatus")->name("user.active");

Route::post("/users/update/request/{id}", "UserController@updateRequest")->name("user.update.request");

Route::get("token/show", 'APITokenController@show')->name("token.show");
Route::get("token/create", 'APITokenController@create')->name("token.create");
Route::get('token/update', 'APITokenController@update')->name("token.update");
