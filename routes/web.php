<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/capacitaciones', function () {
    return view('capacitaciones.index');
});

Route::get('/nosotros', function () {
    return view('nosotros');
});

Route::get('/desarrollo-web', function () {
    return view('desarrollo-web');
});

Route::get('/contactanos', function () {
    return view('contactanos');
});
