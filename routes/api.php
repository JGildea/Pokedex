<?php
use App\Http\Resources\pokemon as pokemonResource;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'API\UserController@details');
    // allows a user to see the pokemon that they have
    Route::get('pokemon/my', function(){
        $pokemon = Auth::user()->pokemon()->orderBy('id')->get();
        return $pokemon;
    });
    //takes a pokemon id number and marks it ass caught by the logged in user
    Route::get('pokemon/{id}/catch', function($pid){
        $user = Auth::user(); 
        $user->pokemon()->sync([($pid)], false); 

    });
});
//return a specific pokemon
Route::get('pokemon/{pokemon}', function (pokemon $pokemon) {
    pokemonResource::withoutWrapping();
    return new pokemonResource($pokemon->load(['types','abilities','egg_groups']));
});
//return a simple paginated list
Route::get('pokemon', function() {
    return pokemon::simplepaginate(10);
});

