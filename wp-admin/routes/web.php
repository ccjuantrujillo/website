<?php

use Illuminate\Support\Facades\Route;

// -------- Login -----------------//
Route::get('/','Auth\LoginController@showLoginForm')->name('login');
Auth::routes();

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

// -------- Misa --------------------//
Route::resource('misa','Admin\MisaController');
Route::get('misa-list-pdf', 'Admin\MisaController@exportPdf')->name('misa.pdf');

//---------- Rutas para DataTable----------------
Route::get('dataTableCancion','Admin\CancionController@dataTable')->name('dataTableCancion');
Route::get('dataTableUser','Admin\UsuarioController@dataTable')->name('dataTableUser');
Route::get('dataTableAsesoria','Admin\AsesoriaController@dataTable')->name('dataTableAsesoria');