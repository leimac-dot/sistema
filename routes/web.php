<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

// Ruta de bienvenida (opcional, te redirige al listado)
Route::get('/', function () {
    return redirect()->route('usuarios.index');
});

// Ruta tipo Resource que conecta todas las funciones del UsuarioController
Route::resource('usuarios', UsuarioController::class);