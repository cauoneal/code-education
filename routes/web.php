<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | This file is where you may define all of the routes that are handled
  | by your application. Just tell Laravel the URIs it should respond
  | to using a Closure or controller method. Build something great!
  |
 */

Route::get('/', function () {
    return view('welcome');
});

//Route::post('oauth/access_token', function () {
//    return Response::json(Authorizer::issueAccessToken());
//});
//Route::get('client',['middleware' => 'oauth','uses'=> 'ClientController@index']);
Route::get('client', 'ClientController@index');
Route::post('client', 'ClientController@store');
Route::get('client/{id}', 'ClientController@show');
Route::delete('client/{id}', 'ClientController@destroy');
Route::put('client/{id}', 'ClientController@update');

Route::get('project/{id}/member', 'ProjectController@members');
Route::post('project/{id}/member/{member_id}', 'ProjectController@addMember');
Route::delete('project/{id}/member/{member_id}', 'ProjectController@removeMember');
//Route::get('project/{id}/task', 'ProjectController@tasks');
//Route::post('project/{id}/task', 'ProjectController@addTask');
//Route::delete('project/{id}/task/{task_id}', 'ProjectController@removeTask');

Route::get('project/{id}/task', 'ProjectTaskController@index');
Route::get('project/{id}/task/{taskId}', 'ProjectTaskController@show');
Route::post('project/{id}/task', 'ProjectTaskController@store');
Route::put('project/{id}/task/{taskId}', 'ProjectTaskController@update');
Route::delete('project/{id}/task/{taskId}', 'ProjectTaskController@destroy');

Route::get('project/{id}/note', 'ProjectNoteController@index');
Route::get('project/{id}/note/{noteId}', 'ProjectNoteController@show');
Route::post('project/{id}/note', 'ProjectNoteController@store');
Route::put('project/{id}/note/{noteId}', 'ProjectNoteController@update');
Route::delete('project/{id}/note/{noteId}', 'ProjectNoteController@destroy');

Route::get('project', 'ProjectController@index');
Route::post('project', 'ProjectController@store');
Route::get('project/{id}', 'ProjectController@show');
Route::delete('project/{id}', 'ProjectController@destroy');
Route::put('project/{id}', 'ProjectController@update');
