<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
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
    return view('index');
})->name('frontpage');


Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/Addnewcategory', [CategoryController::class, 'categoryform'])->name('category.form');
Route::post('/Addnewcategory', [CategoryController::class, 'store'])->name('categories.store');
//edit
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
// Update a specific category
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');