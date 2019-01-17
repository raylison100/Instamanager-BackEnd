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

Route::group([
], function () {
    Route::post('signin','\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');
    Route::post('signup', 'UsersController@store');
    Route::get('Notlogin','UsersController@Notlogin')->name('login');
    Route::get('callback/{code}','InstaContasController@callback');

    Route::group([
        'middleware' => 'auth:api'
    ], function() {

        //Rotas Usuario
        Route::get('logout','UsersController@logout')->name('logout')->middleware('scope:administrador,usuario');
        Route::get('lista','UsersController@index')->middleware('scope:administrador');
        Route::put('atualizarUser/{id}','UsersController@update')->middleware('scope:administrador,usuario');


        //Rotas InstaConta
        Route::get('exibir/{id}','InstaContasController@show')->middleware('scope:administrador,scopes:usuario,assinante');
        Route::get('listaInsta','InstaContasController@index')->middleware('scope:administrador,scopes:usuario,assinante');
        Route::post('cadastraInsta','InstaContasController@store')->middleware('scope:administrador,scopes:usuario,assinante');
        Route::put('updateInsta/{id}','InstaContasController@update')->middleware('scope:administrador,scopes:usuario,assinante');
        Route::get('loginInsta','InstaContasController@loginInsta')->middleware('scope:administrador,scopes:usuario,assinante');
    });
});


