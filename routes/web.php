<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Personas;
use App\Http\Livewire\Tareas;
use App\Http\Livewire\Clientes;
use App\Http\Livewire\Programaciones;
use App\Http\Livewire\Calendario;
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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/personasvista',Personas::class)->name('personasvistanombre');
    Route::get('/clientes',Clientes::class)->name('clientes');
    Route::get('/tareas',Tareas::class)->name('tareas');
    Route::get('/programaciones',Programaciones::class)->name('programaciones');
    Route::get('/tecnicocalendario',Calendario::class)->name('tecnicocalendario');
    // Route::get('/tecnicocalendario',function(){return View::make("livewire.tecnico-calendario");})->name('tecnicocalendario');
});
