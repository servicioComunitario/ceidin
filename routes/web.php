<?php

/**************************** Rutas Privadas **********************************/
Route::group(['middleware' => ['auth','acceso', 'bindings']], function (){
 	
 	// ADMINISTRCIÓN
	Route::resource('periodo', 'PeriodoController');

	// SEGURIDAD
 	Route::resource('acceso', 'AccesoController');
	Route::resource('rol', 'RolController');

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

	Route::get('/', function () { return view('web.portal'); });

});
/**************************** Rutas Públicas **********************************/
