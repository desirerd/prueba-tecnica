<?php

Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/search', 'SearchController@show');
Route::get('/pacientes/json', 'SearchController@data');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/diagnosticos/{id}', 'DiagnosticoController@show');
Route::get('/pacientes/{paciente}', 'PacienteController@show');


Route::middleware(['auth', 'admin'])->prefix('admin')->namespace('Admin')
->group(function () {

	// Diagnosticos
	Route::get('/diagnosticos', 'DiagnosticoController@index'); // listado
	Route::get('/diagnosticos/create', 'DiagnosticoController@create'); // formulario
	Route::post('/diagnosticos', 'DiagnosticoController@store'); // registrar
	Route::get('/diagnosticos/{id}/edit', 'DiagnosticoController@edit'); // formulario edición
	Route::post('/diagnosticos/{id}/edit', 'DiagnosticoController@update'); // actualizar
	Route::delete('/diagnosticos/{id}', 'DiagnosticoController@destroy'); // form eliminar

	// Pacientes
	Route::get('/pacientes', 'PacienteController@index'); // listado
	Route::get('/pacientes/create', 'PacienteController@create'); // formulario
	Route::post('/pacientes', 'PacienteController@store'); // registrar
	Route::get('/pacientes/{paciente}/edit', 'PacienteController@edit'); // formulario edición
	Route::post('/pacientes/{paciente}/edit', 'PacienteController@update'); // actualizar
	Route::delete('/pacientes/{paciente}', 'PacienteController@destroy'); // form eliminar
});
