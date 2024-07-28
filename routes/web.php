<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;


Route::view('/', 'home')->name('home');
Route::view('nosotros', 'nosotros')->name('nosotros');

Route::resource('servicios', 'App\Http\Controllers\ServiciosController')
    ->names('servicios')
    ->middleware('auth');

/* Route::get('servicios', 'App\Http\Controllers\ServiciosController@index')->name('servicios.index');

Route::get('servicios/crear', 'App\Http\Controllers\ServiciosController@create')->name('servicios.create');

Route::get('servicios/{id}/editar', 'App\Http\Controllers\ServiciosController@edit')->name('servicios.edit');

Route::patch('servicios/{id}', 'App\Http\Controllers\ServiciosController@update')->name('servicios.update');

Route::post('servicios', 'App\Http\Controllers\ServiciosController@store')->name('servicios.store');

Route::get('servicios/{id}', 'App\Http\Controllers\ServiciosController@show')->name('servicios.show');
Route::delete('servicios/{servicio}', 'App\Http\Controllers\ServiciosController@destroy')->name('servicios.destroy'); */

Route::view('contacto', 'contacto')->name('contacto');
Route::post('contacto', 'App\Http\Controllers\ContactoController@store')/* ->name('contacto.store') */;

Auth::routes();

/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});
