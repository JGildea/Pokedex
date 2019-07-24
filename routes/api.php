<?php

use App\Http\Resources\pokemon as pokemonResource;
use App\Http\Resources\pokemonCollection;
use Illuminate\Http\Request;
use App\pokemon;

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
//API v_1
    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('login', 'API\UserController@login');
    Route::post('register', 'API\UserController@register');

    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('details', 'API\UserController@details');
        // allows a user to see the pokemon that they have
        Route::get('pokemon/my', 'PokemonController@my');
        //takes a pokemon id number and marks it as caught by the logged in user
        Route::get('pokemon/{pokemon}/catch', 'PokemonController@catch');

    });
    //return a specific pokemon
    Route::get('pokemon/{pokemon}', 'PokemonController@show');
    //return a simple paginated list
    Route::get('pokemon/', 'PokemonController@index');
//API v_1