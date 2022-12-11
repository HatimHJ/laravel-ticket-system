<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// tickets & dashboard route
Route::middleware(['auth', 'verified'])->group(function(){    
    Route::get('/dashboard',[DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/ticket',[TicketsController::class, 'create'])->name('createTicket');
    Route::post('/ticket',[TicketsController::class, 'store']);
    Route::get('/ticket/{id}',[TicketsController::class, 'show'])->name('singleTicket');
    Route::get('/ticket/{id}/edit',[TicketsController::class, 'edit'])->middleware(['admin']);
    Route::patch('/ticket/{id}',[TicketsController::class, 'update'])->middleware(['admin']);    
    Route::put('/ticket/{id}',[TicketsController::class, 'closeTicket']);
});

// users route
Route::middleware(['auth', 'verified', 'admin'])->group(function(){
    Route::get('/user',[DashboardController::class, 'user'])->name('user');    
    Route::put('/user/{id}',[DashboardController::class, 'updateUser'])->name('updateUser');    
    Route::get('/user/{id}',[DashboardController::class, 'showUser'])->name('showUser');
});    

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
