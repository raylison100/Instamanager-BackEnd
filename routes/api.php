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
Route::get('/', function () {
    return redirect('/');
});
Route::group(['prefix' => 'apiInstaManager'], function () {
    //User
    Route::post('users', 'UsersController@store');// Create a user.

    //  Login Management
    Route::post('oauth/token', '\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken')->middleware('check-email-verification', 'insert-scope');//Login de usuario;
    Route::get('activate/{token}', 'Auth\AuthController@enableSignUp');//Ativação de usuario via token em email.
    // Password Management
    Route::group(['prefix' => 'password'], function () {
        Route::post('email', 'Auth\PasswordResetController@create');// Solicitação de reset de senha passando email.
        Route::get('find/{token}', 'Auth\PasswordResetController@find');// Validação de token para reset de senha.
        Route::post('reset', 'Auth\PasswordResetController@reset');// Recebendo dados para auteração de senha.
    });
    // Authenticated Routes
    Route::group(['middleware' => ['auth:api', 'scope:COMMON']], function () {
        // Authenticated
        Route::delete('oauth/tokens', 'Auth\AuthController@destroyToken');//  Destroi token de acesso.
        Route::get('authentication/user', 'Auth\AuthController@getUserAuthenticated');//Ativação de usuario via token em email.
    });
    //Elevated routes released for now

    // User
    Route::get('users', 'UsersController@index');// Return all users.
    Route::get('users/{id}', 'UsersController@show');// Return a users.
    Route::put('users/{id}', 'UsersController@update');// Update a user.
    Route::delete('users/{id}', 'UsersController@destroy');// Delete a user.

    // InstagramAccount
    Route::get('show/{id}','InstaContasController@show')->middleware('scope:administrator,scopes:user,subscriber');
    Route::get('list/instagram','InstaContasController@index')->middleware('scope:administrator,scopes:user,subscriber');
    Route::post('create/instagram','InstaContasController@store')->middleware('scope:administrator,scopes:user,subscriber');
    Route::put('update/instagram/{id}','InstaContasController@update')->middleware('scope:administrator,scopes:user,subscriber');
    Route::get('login/instagram','InstaContasController@loginInsta')->middleware('scope:administrator,scopes:user,subscriber');
});



