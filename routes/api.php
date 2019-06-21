<?php

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
Route::get('pokemon/my', function(){
    $pokemon = Auth::user()->pokemon()->orderBy('id')->get();
    return $pokemon;
});
Route::get('pokemon/{id}/catch', function($pid){
         $user = Auth::user(); 
         $user->pokemon()->sync([($pid)], false); 

});
});

Route::get('pokemon/{id}', function ($id) {
    return pokemon::find($id);
});
Route::get('pokemon', function() {
    return pokemon::simplepaginate(10);
});

