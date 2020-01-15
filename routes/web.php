<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Catalogo de Filmes
Route::get('/filmes/catalogo', 'FilmeController@index')->name('catalogoFilmes');

Route::get('/filmes/catalogo/{id}', 'GeneroController@listByGenres');

// filtrar filmes

Route::get('/filtrar-filmes', 'FilmeController@search');

Auth::routes();

Route::middleware(['auth'])->group(function (){
    // Filmes
    // Listando Filmes
    Route::get('/filmes', 'FilmeController@list')->name('filmes');

    // Criando Filme
    Route::get('/filmes/adicionar', 'FilmeController@create')->name('filme-adicionar');
    Route::post('/filmes/adicionar', 'FilmeController@store');

    // Modificando Filme
    Route::get('/filmes/modificar/{id}', 'FilmeController@edit');
    Route::put('/filmes/modificar/{id}', 'FilmeController@update');

    // Excluindo Filme
    Route::delete('/filmes/remover/{id}', 'FilmeController@destroy');


    // Criando Ator

    Route::get('/cadastroa/adicionar', 'AtorController@create')->name('ator-adicionar');
    Route::post('/cadastroa/adicionar', 'AtorController@store');

    // Listando Ator
    Route::get('/ator', 'AtorController@list')->name('atores');

     // Modificando Ator
     Route::get('/ator/modificar/{id}', 'AtorController@edit');
     Route::put('/ator/modificar/{id}', 'AtorController@update');

    // Criando Genero

    Route::get('/cadastrog/adicionar', 'GeneroController@create')->name('genero-adicionar');
    Route::post('/cadastrog/adicionar', 'GeneroController@store');

    // Excluindo Ator
    Route::delete('/ator/remover/{id}', 'AtorController@destroy');

});
