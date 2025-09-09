<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DropPointController; 
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublicDropPointController;
use App\Http\Controllers\HistoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Tambahkan route resource untuk drop point di sini
    Route::resource('drop-points', DropPointController::class); 
    //
     Route::get('/drop-points-list', [PublicDropPointController::class, 'index'])->name('drop-points.list');
     Route::get('/history', [HistoryController::class, 'index'])->name('history.index');
     Route::get('/history/{collection}', [HistoryController::class, 'show'])->name('history.show');
});

// Grup HANYA untuk ADMIN
Route::middleware(['auth', 'is_admin'])->group(function () {
    // Letakkan semua rute yang hanya bisa diakses admin di sini
    Route::resource('drop-points', DropPointController::class);
    Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
    Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
});

require __DIR__.'/auth.php';