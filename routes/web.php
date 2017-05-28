<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (){
	return redirect()->to('/reconocimiento-emociones');
});

Route::get('estudio-perspectivas-2017', 'TestController@index');

Route::get('estudio-perspectivas-2017/consentimiento-informado', 'TestController@consentimiento');

Route::get('items', 'ItemsController@index');

Route::post('response', 'TestController@store');

Route::group(['prefix' => 'reconocimiento-emociones'], function(){

	Route::get('/', 'EmotionsController@index');

	Route::get('generator', 'EmotionsController@generator');

	Route::post('generator', 'EmotionsController@generatorStore');

	Route::get('consentimiento-informado', 'EmotionsController@consentimiento');

});