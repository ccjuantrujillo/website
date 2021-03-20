<?php

use Illuminate\Support\Facades\Route;

// -------- Login -----------------//
Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
Auth::routes();

// -------- Web -----------------//
Route::get('/', 'WebController@index')->name('web');
Route::get('/lectura', 'WebController@lectura')->name('lectura');
Route::get('/cancionero', 'WebController@cancionero')->name('cancionero');
Route::get('/misas', 'WebController@misas')->name('misas');

// -------- Home -----------------//
Route::get('/home', 'HomeController@index')->name('home');

// -------- Usuario -----------------//
Route::resource('/usuario','Admin\UsuarioController');
Route::get('/usuario/list','Admin\UsuarioController@list');

// -------- Categoria -----------------//
Route::resource('/categoria','Admin\CategoriaController');
Route::get('/categoria_dt_ajax','Admin\CategoriaController@dtajax');

// -------- Cancion -----------------//
Route::resource('/cancion','Admin\CancionController');
Route::get('/cancion_dt_ajax','Admin\CancionController@dtajax');

// -------- Curso --------------------//
Route::resource('curso','Admin\CursoController');
Route::get('cursos-list-pdf', 'Admin\CursoController@exportPdf')->name('cursos.pdf');

//---------- Rutas para DataTable----------------
Route::get('dataTableCancion','Admin\CancionController@dataTable')->name('dataTableCancion');
Route::get('dataTableUser','Admin\UsuarioController@dataTable')->name('dataTableUser');
Route::get('dataTableAsesoria','Admin\AsesoriaController@dataTable')->name('dataTableAsesoria');