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

// Trainers
Route::get('trainers', 'TrainerController@index')->name('trainers.index');

Route::get('trainers/create', 'TrainerController@create')->name('trainers.create');
Route::post('trainers/create', 'TrainerController@store');

Route::get('trainer/edit/{id}/{name?}', 'TrainerController@edit')->name('trainer.edit');
Route::put('trainer/save/{id}', 'TrainerController@update')->name('trainer.edit.submit');

Route::get('trainer/destroy/{id}/{name?}', 'TrainerController@destroy')->name('trainer.destroy');
Route::get('trainer/{id}/{name?}', 'TrainerController@show')->name('trainers.show');

// Pokemons
Route::get('pokemons', 'PokemonController@index')->name('pokemons.index');
Route::post('trainer/{id}/{name?}/pokemons', 'PokemonController@store');

// Otros
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
