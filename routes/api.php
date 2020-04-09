<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

    Route::post('login', 'API\UserController@login');
    Route::post('register', 'API\UserController@register');
    Route::get('email_validate/{email}', 'API\UserController@getEmail');
    

    Route::group(['middleware' => 'auth:api'], function(){
        Route::post('details', 'API\UserController@details');

        ////// PROFILE
        Route::get('profile','API\ProfileController@index');
        ///// Create
        Route::post('create','API\ProfileController@create');
        //// Update
        Route::post('update','API\ProfileController@update');


        ////// IMAGES
        Route::get('images','API\ImageController@index');
        //// Create
        Route::post('subir_imagen','API\ImageController@create');
        /// GetImage
        Route::get('image/{nombreFoto}','API\ImageController@getImage');

    });