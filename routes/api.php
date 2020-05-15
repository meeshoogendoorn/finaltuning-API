<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('apiTokenAuth')->group( function () {
    Route::resource('cars', 'API\CarController');
    Route::get('/models/{manufacturer}', 'API\ModelController@index');
    Route::get('/generations/{manufacturer}/{model}', 'API\GenerationController@index');
    Route::get('/engines/{id}', 'API\EngineController@index');
    Route::get('/result/{id}', 'API\ResultController@index');
    Route::get('/info/{id}', 'API\ResultController@getTuneInfo');
});

Route::middleware("auth")->group(function(){

});
