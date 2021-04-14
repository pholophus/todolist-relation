<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\TodolistController;
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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::resource('todolists', TodolistController::class);

Route::get('/todolists', [TodolistController::class, 'index'])->name('list');
Route::get('/todolists/create', [TodolistController::class, 'create'])->name('create');
Route::post('/todolists', [TodolistController::class, 'store'])->name('store');
Route::get('/todolists/{todolist}', [TodolistController::class, 'show'])->name('show');
Route::get('/todolists/{todolist}/edit', [TodolistController::class, 'edit'])->name('edit');
Route::put('/todolists/{todolist}', [TodolistController::class, 'update'])->name('update');
Route::delete('/todolists/{todolist}', [TodolistController::class, 'destroy'])->name('destroy');