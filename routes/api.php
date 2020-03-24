<?php

use Illuminate\Http\Request;

/*
|----------------------------------------------------------------------
| API Routes
|----------------------------------------------------------------------
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::delete('/erase', 'EventController@erase');
Route::post('/events', 'EventController@store');
Route::get('/events','EventController@index');
Route::get('/events/actors/{actor_id}', 'EventController@actor');
Route::put('/actors/{id}', 'UserController@update');
Route::get('/actors', 'UserController@actors');
Route::get('/actors/streak', 'UserController@streak');


Route::get('file', 'FileController@downloadFile');
Route::post('file', 'FileController@store');





