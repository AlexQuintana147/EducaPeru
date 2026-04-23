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
