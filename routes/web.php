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

	//Constancias
	Route::resource('constancia', 'ConstanciaEstudioController');

	Route::get('constancia/constancia/{id?}', array(
            'as' => 'constancia.constancia',
            'uses' => 'ConstanciaEstudioController@constancia'));

	Route::get('solicitudes/constancias', array(
            'as' => 'constancia.solicitudes',
            'uses' => 'ConstanciaEstudioController@listaSolicitudes'));

	Route::post('solicitudes/aprobar', array(
            'as' => 'constancia.aprobar',
            'uses' => 'ConstanciaEstudioController@aprobarConstancia'));

	Route::get('admin/constancia/representante', array(
            'as' => 'admin.constancia.representante',
            'uses' => 'ConstanciaEstudioController@adminConstancia'));

	Route::get('admin/constancia/alumnos/{id?}', array(
            'as' => 'admin.constancia.alumno',
            'uses' => 'ConstanciaEstudioController@adminAlumnosConstancia'));

	Route::get('admin/constancia/pdf/{id?}', array(
            'as' => 'admin.constancia.pdf',
            'uses' => 'ConstanciaEstudioController@adminPdf'));

	//Retiros
	Route::resource('retiro', 'RetiroController');

	Route::post('retiros/aprobar', array(
            'as' => 'retiro.aprobar',
            'uses' => 'RetiroController@aprobarRetiro'));

	Route::get('solicitudes/retiros', array(
            'as' => 'retiro.solicitudes',
            'uses' => 'RetiroController@listaSolicitudesRetiro'));

	Route::post('retiro/aprobar', array(
            'as' => 'retiro.aprobar',
            'uses' => 'RetiroController@aprobarRetiro'));

	Route::get('retiro/retiro/{id?}', array(
            'as' => 'retiro.retiro',
            'uses' => 'RetiroController@retiro'));

	Route::get('admin/retiro/representante', array(
            'as' => 'admin.retiro.representante',
            'uses' => 'RetiroController@adminRetiro'));

	Route::get('admin/retiro/alumnos/{id?}', array(
            'as' => 'admin.retiro.alumno',
            'uses' => 'RetiroController@adminAlumnosRetiro'));

	Route::get('admin/retiro/pdf/{id?}', array(
            'as' => 'admin.retiro.pdf',
            'uses' => 'RetiroController@adminPdf'));

	Route::resource('colaboracion','ColaboracionesController');

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

	Route::resource('usuario', 'UsuarioController', ['only' => [
	    'edit', 'update'
	]]);

	//
	Route::resource('inscripcion', 'InscripcionController');


	Route::name('datos_basico.buscar')->get('datos_basico/{cedula}/buscar_datos_basicos', 'DatosBasicoController@buscar');



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

Route::get('prueba', function(){
	return view('pdf.constancia');
});
