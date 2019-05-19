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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'api\RelaxMusicController@index');
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/api/user', 'api\UserController@user');
    Route::post('/api/favAdd', "api\RelaxMusicController@favouriteAdd");
    Route::post('/api/favDel', "api\RelaxMusicController@favouriteDelete");
});



Route::get('/api/favourite', "api\RelaxMusicController@favourite");
Route::get("/api/library", "api\RelaxMusicController@index")->name("music.library");
Route::group(['prefix' => '/api/category','namespace'=>'api'], function () {
    Route::get('/{id}', "RelaxMusicController@categoryDetail");
});


