<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;

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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [BooksController::class, 'index'])->name('home');

Route::get('/book/edit/{id}', [BooksController::class, 'edit'])->name('book.edit');
Route::get('/book/pinjam/{id}', [BooksController::class, 'showpinjam'])->name('book.pinjam');

Route::post('/book/pinjam', [BooksController::class, 'pinjam'])->name('book.pinjam.create');

Route::put('/book/update/{id}', [BooksController::class, 'update'])->name('book.update');
Route::delete('/book/delete/{id}', [BooksController::class, 'destroy'])->name('book.delete');
Route::post('/book/create', [BooksController::class, 'create'])->name('book.create');
