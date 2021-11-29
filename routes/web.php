<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('welcome'); });
Route::get('validar', function () { return view('certificados/validar'); });
Route::get('emitir', function () { return view('certificados/emitir'); });

Route::get('certificados', 'CertificadoController@index');
Route::get('certificados/segunda-via', function () { return view('certificados/segunda-via'); });
Route::get('certificados/validacao', function () { return view('certificados/validacao'); });
Route::post('certificados/segunda-via', 'CertificadoController@emitirCertificado');
Route::post('certificados/validacao', 'CertificadoController@validarCertificado');
Route::get('certificados/gerar/{hash}', 'CertificadoController@gerarCertificado');
Route::get('certificados/validar/{hash}', 'CertificadoController@validarHash');
Route::get('certificados/notificar/{id}', 'CertificadoController@notificar');
Route::get('certificados/cadastrar/arquivo', 'CertificadoController@arquivo');

Auth::routes();

Route::resource('certificados', 'CertificadoController');
Route::resource('eventos', 'EventoController');
Route::resource('modelos', 'ModeloController');
Route::resource('participantes', 'ParticipantesController');

Route::get('mensagem/teste','EventoController@teste');


Route::get('notificacoes', 'NotificacaoController@index');
Route::get('notificacoes/enviar', 'NotificacaoController@enviar');

Route::get('certificado/gerar/{hash}', 'CertificadoController@gerarCertificadoPdf');
Route::get('eventos/{id}/certificados', 'EventoController@certificados');
Route::get('home', 'HomeController@index');
Route::get('eventos', 'EventoController@index');
Route::get('eventos/create', 'EventoController@create')->name('evento.create');
Route::get('certificados', 'CertificadoController@index');
Route::get('estatisticas', 'EstatisticasController@index');
Route::get('participantes', 'ParticipantesController@index');
Route::get('usuarios', 'UserController@index');

Route::post('certificado/emitir', 'CertificadoController@emitir');
Route::post('certificado/validar', 'CertificadoController@validar');
Route::post('certificado/create/arquivo', 'CertificadoController@cadastrarLista');

Route::get('arquivos', 'DadosController@index');
Route::post('leitura', 'DadosController@lerArquivo');
