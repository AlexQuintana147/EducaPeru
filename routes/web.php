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

Route::get('/contactanos', function () {
    return view('contactanos');
});

/*
|--------------------------------------------------------------------------
| CAPACITACIONES DINÁMICAS
|--------------------------------------------------------------------------
*/

Route::get('/capacitaciones/{curso}', function ($curso) {

    $cursosPermitidos = [
        'ofimatica',
        'marketing',
        'python',
        'cpp',
    ];

    if (!in_array($curso, $cursosPermitidos)) {
        abort(404);
    }

    return view('capacitaciones.index', [
        'curso' => $curso
    ]);
});
