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
    return view('app');
});

Route::post('oauth/access_token', function () {
    return Response::json(Authorizer::issueAccessToken());
});

Route::group(['middleware' => 'oauth'], function() {
    
    Route::resource('client', 'ClientController', ['except' => ['create', 'edit']]);
    
//  o middleware verifica em todas as rotas a permissão o que pode não ser interessante no
//  caso da rota index pois não temos nenhum parametro  
//    Route::group(['middleware' => 'CheckProjectOwner'], function(){
      Route::resource('project', 'ProjectController', ['except' => ['create', 'edit']]);  
//    });    
    Route::group(['prefix' => 'project'], function() {        

        Route::get('{id}/member', 'ProjectController@members');
        Route::post('{id}/member/{member_id}', 'ProjectController@addMember');
        Route::delete('{id}/member/{member_id}', 'ProjectController@removeMember');

        Route::get('{id}/task', 'ProjectTaskController@index');
        Route::get('{id}/task/{taskId}', 'ProjectTaskController@show');
        Route::post('{id}/task', 'ProjectTaskController@store');
        Route::put('{id}/task/{taskId}', 'ProjectTaskController@update');
        Route::delete('{id}/task/{taskId}', 'ProjectTaskController@destroy');

        Route::get('{id}/note', 'ProjectNoteController@index');
        Route::get('{id}/note/{noteId}', 'ProjectNoteController@show');
        Route::post('{id}/note', 'ProjectNoteController@store');
        Route::put('{id}/note/{noteId}', 'ProjectNoteController@update');
        Route::delete('{id}/note/{noteId}', 'ProjectNoteController@destroy');
        
        Route::post('{id}/file','ProjectFileController@store');
    });
});




