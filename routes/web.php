<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/capacitaciones', function () {
    return view('capacitaciones');
});

Route::get('/nosotros', function () {
    return view('nosotros');
});

Route::get('/desarrollo-web', function () {
    return view('desarrollo-web');
});

Route::get('/capacitaciones/ofimatica', function () {
    return view('capacitaciones.ofimatica');
});

Route::get('/capacitaciones/python', function () {
    return view('capacitaciones.python');
});

