<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();
	Route::get('/', 'HomeController@checkLogged');
    Route::get('/home', array(
    	'as'=>'home',
    	'uses'=>'HomeController@index'
		)
	);
	Route::get('/pages',array(
		'as'=>'pages',
		'uses'=>'PageController@listPages'
		)
	);
	Route::get('/groups',array(
		'as'=>'groups',
		'uses'=>'GroupController@listGroups'
		)
	);
	Route::get('/group/{groupName}', 'GroupController@editGroup');
	Route::post('/group/{groupName}', array(
		'as'=> 'groupUpdate',
		'uses'=> 'GroupController@saveGroup'
		)
	);
	Route::get('/newGroup','GroupController@newGroup');
	Route::post('/newGroup',array(
		'as' => 'groupInsert',
		'uses' => 'GroupController@saveGroup'
		)
	);
	Route::post('/checkGroupRemoval','GroupController@checkForPages');
});
