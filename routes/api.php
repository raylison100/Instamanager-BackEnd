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
Route::post('store', 'UsersController@store');


Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login','AuthController@login');
    Route::post('signup', 'AuthController@signup');

    Route::group([
        'middleware' => 'auth:api'
    ], function() {

        Route::get('logout','AuthController@logout')->name('logout');

        Route::get('lista','UsersController@index');
        Route::post('cadastra','UsersController@store');
        Route::put('atualizarUser/{id}','UsersController@update');

        Route::get('listaInsta','InstaContasController@index');
        Route::post('cadastraInsta','InstaContasController@store');
        Route::put('updateInsta/{id}','InstaContasController@update');


        Route::get('callback/{code}','InstaContasController@callback');
        Route::get('login','InstaContasController@loginInsta');
    });
});


