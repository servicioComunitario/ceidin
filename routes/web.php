<?php

/**************************** Rutas Privadas **********************************/
Route::group(['middleware' => ['auth','acceso', 'bindings']], function (){
 	
	Route::resource('periodo', 'PeriodoController');

});
/**************************** Rutas Privadas **********************************/
/*----------------------------------------------------------------------------*/
/*************************** Rutas Protegidas *********************************/
Route::group(['middleware' => 'auth', 'bindings'], function (){

 	Route::get('/home', 'HomeController@index')->name('home');

});
/*************************** Rutas Protegidas *********************************/
/*----------------------------------------------------------------------------*/
/**************************** Rutas Públicas **********************************/
Route::group(['middleware' => 'bindings'], function (){

	Auth::routes();

	Route::get('/', function () { return view('welcome'); });

});
/**************************** Rutas Públicas **********************************/
