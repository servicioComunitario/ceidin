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

	// buscar padre por numero de cedula
	Route::name('padre.buscar')->get('padre/{cedula}/buscar_padre', 'PadreController@buscar_padre');
	
	// 
	Route::resource('alumno', 'AlumnoController');

	// 
	Route::resource('representante', 'RepresentanteController');

	// buscar representante por numero de cedula
	Route::name('representante.buscar')->get('representante/{cedula}/buscar_representante', 'RepresentanteController@buscar_representante');

	//
	Route::resource('inscripcion', 'InscripcionController');

	Route::name('datos_basico.buscar')->get('datos_basico/{cedula}/buscar_datos_basicos', 'DatosBasicoController@buscar');



});
/*************************** Rutas Protegidas *********************************/
/*----------------------------------------------------------------------------*/
/**************************** Rutas Públicas **********************************/
Route::group(['middleware' => 'bindings'], function (){

	Auth::routes();

	Route::get('/', function () { return view('web.portal'); });

});
/**************************** Rutas Públicas **********************************/


