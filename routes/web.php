<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\DashboardController;

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

Route::get('/dashboard',[DashboardController::class, 'dashboard'])
->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/ticket',[DashboardController::class, 'createTicket'])
->middleware(['auth', 'verified'])->name('createTicket');

Route::post('/ticket',[DashboardController::class, 'storeTicket'])
->middleware(['auth', 'verified']);

Route::get('/user',[DashboardController::class, 'user'])
    ->middleware(['auth', 'verified', 'admin'])->name('user');

Route::put('/user/{id}',[DashboardController::class, 'updateUser'])
    ->middleware(['auth', 'verified', 'admin'])->name('updateUser');

Route::get('/user/{id}',[DashboardController::class, 'showUser'])
    ->middleware(['auth', 'verified', 'admin'])->name('showUser');

    
Route::get('/ticket/{id}',[DashboardController::class, 'show'])
->middleware(['auth', 'verified'])->name('singleTicket');

Route::get('/ticket/{id}/edit',[DashboardController::class, 'manageTicket'])
->middleware(['auth', 'verified', 'admin']);

Route::patch('/ticket/{id}',[DashboardController::class, 'editTicket'])
->middleware(['auth', 'verified', 'admin']);
    
Route::put('/ticket/{id}',[DashboardController::class, 'updateTicket'])
    ->middleware(['auth', 'verified']);







Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
