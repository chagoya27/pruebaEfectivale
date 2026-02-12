<?php

use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Mime\Message;

/*ruta inicial*/
Route::get('/', function () {
    return view('index');
})->name('index');

/*ruta para visualizar los datos de mensaje.json*/
Route::get('/ver-mensaje',[MessageController::class,'index'])->name('message.index');

/*ruta para capturar los datos asincronos y escribir en mensajes.json*/
Route::post('/guardar-mensaje',[MessageController::class,'store'])->name('message.store');
