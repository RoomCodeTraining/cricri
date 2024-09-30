<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

// Mise à jour de la route /panel
Route::get('/panel', function () {
    return redirect('/admin'); // Remplace '/admin' par l'URL correcte de ton tableau de bord Filament
})->name('panel');
