<?php

use Illuminate\Support\Facades\Route;

// -------- Login -----------------//
Route::get('/','Auth\LoginController@showLoginForm')->name('login');
Auth::routes();

// -------- Home -----------------//
Route::get('/home', 'HomeController@index')->name('home');

// -------- Solicitante -----------------//
Route::resource('solicitante','Admin\SolicitanteController');
Route::get('/solicitante/list','Admin\SolicitanteController@list');

// -------- Contacto -----------------//
Route::resource('contacto','Admin\ContactoController');
Route::get('/contacto/list','Admin\ContactoController@list');
Route::get('/contacto/{contacto}/get','Admin\ContactoController@get');

// -------- Usuario -----------------//
Route::resource('/usuario','Admin\UsuarioController');
Route::get('/usuario/list','Admin\UsuarioController@list');

// -------- Asesoria -----------------//
Route::resource('asesoria','Admin\AsesoriaController');

// -------- Categoria -----------------//
Route::resource('/categoria','Admin\CategoriaController');
Route::get('/categoria_dt_ajax','Admin\CategoriaController@dtajax');

// -------- Curso --------------------//
Route::resource('curso','Admin\CursoController');
Route::get('cursos-list-pdf', 'Admin\CursoController@exportPdf')->name('cursos.pdf');

// -------- Instructor --------------------//
Route::resource('instructor','Admin\InstructorController');

// -------- Cotizacion --------------------//
Route::post('/cotizacion/store', 'Admin\CotizacionController@store');
Route::get('/cotizacion/list', 'Admin\CotizacionController@list');
Route::get('/cotizacion/create', 'Admin\CotizacionController@create')->name('createCotizacion');
Route::get('/cotizacion', 'Admin\CotizacionController@index');
Route::delete("/cotizacion/delete/{id}","Admin\CotizacionController@delete")->name("delCotizacion");
Route::get('/cotizacion/{cotizacion}/get','Admin\CotizacionController@get');
Route::get('/cotizacion/{cotizacion}/edit','Admin\CotizacionController@edit');
Route::get('cotizaciones-list-pdf', 'Admin\SolicitanteController@exportPdf')->name('cotizaciones.pdf');

// -------- Cotizacion detalle --------------------//
Route::put("/cotizacion/update",'Admin\CotizacionController@update')->name('updateCotizacion');
Route::get('/cotizaciondetalle/{cotizacion}/list','Admin\CotizacionDetalleController@list');
Route::delete('/cotizaciondetalle/delete/{id}','Admin\CotizacionDetalleController@delete');

// -------- Horario --------------------//
Route::resource('horario-curso','Admin\HorarioCursoController');
Route::resource('horario-instructor','Admin\HorarioInstructorController');
Route::resource('instructor-curso','Admin\CursoInstructorController');

// -------- Descuento --------------------//
Route::resource('descuento','Admin\DescuentoController');

//---------- Rutas para DataTable----------------
Route::get('dataTableUser','Admin\UsuarioController@dataTable')->name('dataTableUser');
Route::get('dataTableAsesoria','Admin\AsesoriaController@dataTable')->name('dataTableAsesoria');