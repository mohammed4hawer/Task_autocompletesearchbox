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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/autocomplete','AutocompleteController@index')->name('autocomplete');
Route::post('/autocomplete/catch', 'AutocompleteController@catchdata')->name('autocomplete.catch');

// Route::get('/autocomplete', 'AutocompleteController@index');
Route::get('/autocomplete/fetch_data', 'AutocompleteController@fetch_data')->name('autocomplete.fetch_data');
Route::post('/autocomplete/add_data', 'AutocompleteController@add_data')->name('autocomplete.add_data');