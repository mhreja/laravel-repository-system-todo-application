<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

// Route::resource('/', TodoController::class);
Route::get('/', [TodoController::class, 'index'])->name('index');
Route::get('/create', [TodoController::class, 'create'])->name('create');
Route::post('/create', [TodoController::class, 'store'])->name('store');
Route::get('/{id}/edit', [TodoController::class, 'edit'])->name('edit');
Route::put('/{id}/edit', [TodoController::class, 'update'])->name('update');
Route::delete('/{id}', [TodoController::class, 'destroy'])->name('destroy');
Route::get('/{id}/mark-done', [TodoController::class, 'markdone'])->name('markdone');
