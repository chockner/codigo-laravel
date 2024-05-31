<?php

use Illuminate\Support\Facades\Route;


$servicios = [
    ['titulo' => 'servicio 02'],
    ['titulo' => 'servicio 01'],
    ['titulo' => 'servicio 03'],
    ['titulo' => 'servicio 04'],
    ['titulo' => 'servicio 05'],

];


Route::view('/', 'home')->name('home');
Route::view('nosotros', 'nosotros')->name('nosotros');
Route::view('servicios', 'servicios', compact('servicios'))->name('servicios');
//route::get('servicios','App\Http\Controllers\ServiciosController@servicios')->name('servicios');
//route::get('servicios','App\Http\Controllers\Servicios2Controller@index')->name('servicios');
//Route::resource('servicios', 'App\Http\Controllers\Servicios2Controller');
//Route::resource('servicios', 'App\Http\Controllers\Servicios2Controller')->except('index', 'show');
//Route::resource('servicios', 'App\Http\Controllers\Servicios2Controller')->only('index', 'show');
Route::view('contacto', 'contacto')->name('contacto');
