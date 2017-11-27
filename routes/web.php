<?php
/**************************** Rutas Privadas **********************************/
Route::group(['middleware' => ['auth','acceso', 'bindings']], function (){
 	
 	// EDITAR PORTAL WEB
	Route::resource('noticia', 'NoticiaController', ['except' => ['show']]);

 	// ADMINISTRCIÓN
	Route::resource('periodo', 'PeriodoController');
	Route::resource('usuario', 'UsuarioController', ['except' => [
	    'edit', 'update'
	]]);

	// SEGURIDAD
 	Route::resource('acceso', 'AccesoController');
	Route::resource('rol', 'RolController');

	//DOCENTE
	Route::resource('docente', 'DocenteController');
	Route::resource('docente_periodo', 'DocentePeriodoController');

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


	//Route::resource('inscripcion', 'InscripcionController');

	Route::resource('usuario', 'UsuarioController', ['only' => [
	    'edit', 'update'
	]]);


});
/*************************** Rutas Protegidas *********************************/
/*----------------------------------------------------------------------------*/
/**************************** Rutas Públicas **********************************/
Route::group(['middleware' => 'bindings'], function (){

	Auth::routes();

	Route::get('/', 'PortalController@index')->name('portal');
	
	Route::resource('noticia', 'NoticiaController', ['only' => ['show']]);

});
/**************************** Rutas Públicas **********************************/


