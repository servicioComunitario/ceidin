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
Route::group(['middleware' => ['auth', 'bindings']], function (){

 	Route::get('/home', 'HomeController@index')->name('home');

	//  
	Route::resource('padre', 'PadreController');

	// 
	Route::resource('alumno', 'AlumnoController');

	// 
	Route::resource('representante', 'RepresentanteController');


	Route::resource('inscripcion', 'InscripcionController');


});
/*************************** Rutas Protegidas *********************************/
/*----------------------------------------------------------------------------*/
/**************************** Rutas Públicas **********************************/
Route::group(['middleware' => 'bindings'], function (){

	Auth::routes();

	Route::get('/', function () { return view('welcome'); });

});
/**************************** Rutas Públicas **********************************/


