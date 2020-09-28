<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('welcome'); });
Route::get('validar', function () { return view('certificados/validar'); });

Auth::routes();

Route::resource('eventos', 'EventoController');

Route::get('eventos/{id}/certificados', 'EventoController@certificados')->name('home');
Route::get('home', 'HomeController@index')->name('home');
Route::get('eventos', 'EventoController@index')->name('home');
Route::get('eventos/create', 'EventoController@create')->name('evento.create');
Route::get('certificados', 'CertificadoController@index')->name('home');
Route::get('estatisticas', 'EstatisticasController@index')->name('home');
Route::get('usuarios', 'UserController@index')->name('home');