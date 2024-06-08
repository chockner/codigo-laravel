<?php

use Illuminate\Support\Facades\Route;



Route::view('/', 'home')->name('home');
Route::view('nosotros', 'nosotros')->name('nosotros');
//Route::view('servicios', 'servicios', compact('servicios'))->name('servicios');

route::get('servicios', 'App\Http\Controllers\ServiciosController@index')->name('servicios');
route::get('servicios/{id}', 'App\Http\Controllers\ServiciosController@show')->name('servicios.show');

//route::get('servicios', 'App\Http\Controllers\Servicios2Controller@index')->name('servicios');
//Route::resource('servicios', 'App\Http\Controllers\Servicios2Controller');
//Route::resource('servicios', 'App\Http\Controllers\Servicios2Controller')->except('index', 'show');
//Route::resource('servicios', 'App\Http\Controllers\Servicios2Controller')->only('index', 'show');
Route::view('contacto', 'contacto')->name('contacto');
