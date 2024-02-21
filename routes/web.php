<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductesController;

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
Route::get('/productes', [ProductesController::class, 'index'])->name('productes.index');
Route::get('/{id}', [ProductesController::class, 'show'])->name('productes.show');
Route::get('/productes/create', [ProductesController::class, 'create'])->name('productes.create');
Route::post('/productes', [ProductesController::class, 'store'])->name('productes.store');
Route::get('/{id}/edit', [ProductesController::class, 'edit'])->name('productes.edit');
Route::put('/productes/{id}', [ProductesController::class, 'update'])->name('productes.update');
Route::delete('/productes/{id}', [ProductesController::class, 'destroy'])->name('productes.destroy');
Route::post('/productes/{id}/increment', [ProductesController::class, 'incrementStock'])->name('productes.incrementStock');
Route::post('/productes/{id}/decrement', [ProductesController::class, 'decrementStock'])->name('productes.decrementStock');