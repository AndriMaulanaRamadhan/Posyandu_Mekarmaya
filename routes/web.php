<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

// Route Login
Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

// Route Register
Route::get('/register', [App\Http\Controllers\RegisterController::class, 'index'])->name('register');
Route::post('/register', [App\Http\Controllers\RegisterController::class, 'store'])->name('register.store');



Route::get('/penduduk', [App\Http\Controllers\DataPendudukController::class, 'index'])->name('view_penduduk');

// Route method destroy
Route::delete('/penduduk/{id}', [App\Http\Controllers\DataPendudukController::class, 'destroy'])->name('view_penduduk.destroy');

//Route Tambah Penduduk
Route::get('/tambah_penduduk', [App\Http\Controllers\DataPendudukController::class, 'create'])->name('tambah_penduduk.create');
Route::post('/penduduk', [App\Http\Controllers\DataPendudukController::class, 'store'])->name('view_penduduk.store');

//Route Edit Penduduk
Route::get('/penduduk/{id}/edit', [App\Http\Controllers\DataPendudukController::class, 'edit'])->name('view_penduduk.edit');
Route::put('/penduduk/{id}', [App\Http\Controllers\DataPendudukController::class, 'update'])->name('view_penduduk.update');