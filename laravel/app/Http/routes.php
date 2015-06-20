<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'namespace' => 'Admin'], function() {
	Route::get('/', 'AdminController@index');
	Route::resource('tilelayer', 'TileLayerController');
	Route::resource('vectorlayer', 'VectorLayerController');
	Route::resource('wms/map', 'WmsMapController');
	Route::resource('projection', 'ProjectionController');

	Route::any('datasources', 'HelperController@getDataSources');
	Route::any('mapserver', 'HelperController@getMsVersion');
	Route::any('outputformats', 'HelperController@getOutputFormats');
	Route::any('assets/icons', 'HelperController@getAssetsIcons');
});

Route::get('map', 'MapController@index');
Route::get('map/{file}', 'MapController@show');

Route::resource('layer', 'LayerController',
	['only' => ['index', 'show']]);

Route::resource('projection', 'ProjectionController', ['only' => ['index', 'show']]);

Route::resource('tilelayer', 'TileLayerController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
