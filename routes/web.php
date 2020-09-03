<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Página de inicio
Route::get('/', 'InicioController')->name('inicio');

Auth::routes(['verify' => true]);

// Buscar Vacantes
Route::get('/vacantes/buscar', 'VacanteController@resultados')->name('vacantes.resultados');
Route::post('/vacantes/buscar', 'VacanteController@buscar')->name('vacantes.buscar');

Route::resource('vacantes', 'VacanteController');

Route::post('/vacantes/imagen', 'VacanteController@imagen')->name('vacantes.imagen');

Route::post('/vacantes/borrarimagen', 'VacanteController@borrarimagen')->name('vacantes.borrar');

// Cambiar estado de una vacante
Route::post('/vacantes/{vacante}', 'VacanteController@estado')->name('vacantes.estado');

// Aplicar para una vacante
Route::get('/candidatos/{id}', 'CandidatoController@index')->name('candidatos.index');
Route::post('/candidatos/store', 'CandidatoController@store')->name('candidatos.store');

// Notificaciones
Route::get('/notificaciones', 'NotificacionesController')->name('notificaciones');

// Categorías
Route::get('/categorias/{categoria}', 'CategoriaController@show')->name('categorias.show');