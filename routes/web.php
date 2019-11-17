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
    return view('frontend.pages.home');
})->name('front');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'HomeController@profile')->name('users.profile');

/**
 * Disciplines Routes
 */
Route::get('/disciplines', 'DisciplineController@index')->name('disciplines.index');
Route::get('/disciplines/create', 'DisciplineController@create')->name('disciplines.create');
Route::post('/disciplines', 'DisciplineController@store')->name('disciplines.store');
Route::get('/disciplines/{discipline}/show', 'DisciplineController@show')->name('disciplines.show');
Route::get('/disciplines/{discipline}/edit', 'DisciplineController@edit')->name('disciplines.edit');
Route::put('/disciplines/{discipline}/update', 'DisciplineController@update')->name('disciplines.update');
Route::put('/disciplines/{discipline}/activate', 'DisciplineController@activation')->name('disciplines.activate');
Route::put('/disciplines/{discipline}/deactivate', 'DisciplineController@deactivation')->name('disciplines.deactivate');
Route::delete('/disciplines/{discipline}/delete', 'DisciplineController@destroy')->name('disciplines.destroy');
Route::get('/disciplines/active', 'DisciplineController@index_active')->name('disciplines.active.index');
Route::get('/disciplines/inactive', 'DisciplineController@index_inactive')->name('disciplines.inactive.index');

/**
 * Types Routes
 */
Route::get('/types', 'TypeController@index')->name('types.index');
Route::get('/types/create', 'TypeController@create')->name('types.create');
Route::post('/types', 'TypeController@store')->name('types.store');
Route::get('/types/{type}/show', 'TypeController@show')->name('types.show');
Route::get('/types/{type}/edit', 'TypeController@edit')->name('types.edit');
Route::put('/types/{type}/update', 'TypeController@update')->name('types.update');
Route::put('/types/{type}/activate', 'TypeController@activation')->name('types.activate');
Route::put('/types/{type}/deactivate', 'TypeController@deactivation')->name('types.deactivate');
Route::delete('/types/{type}/delete', 'TypeController@destroy')->name('types.destroy');

/**
 * Papers Routes
 */
Route::get('/papers', 'PaperController@index')->name('papers.index');
Route::get('/papers/submitted', 'PaperController@index_submitted')->name('papers.submitted');

Route::get('/papers/create', 'PaperController@create')->name('papers.create');
Route::post('/papers', 'PaperController@store')->name('papers.store');
Route::get('/papers/{paper}/show', 'PaperController@show')->name('papers.show');
Route::get('/papers/{paper}/edit', 'PaperController@edit')->name('papers.edit');
Route::put('/papers/{paper}/update', 'PaperController@update')->name('papers.update');
Route::delete('/papers/{paper}/delete', 'PaperController@destroy')->name('papers.destroy');
