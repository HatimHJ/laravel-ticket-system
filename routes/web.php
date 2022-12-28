<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;

Route::get('/', function () {
    return view('welcome');
});



// ticket route
Route::middleware(['auth', 'verified'])->prefix('dashboard')->group(function(){
    Route::get('',[DashboardController::class, 'dashboard']);
    Route::get('/ticket',[TicketsController::class, 'index']);
    Route::get('/ticket/create',[TicketsController::class, 'create']);
    Route::post('/ticket',[TicketsController::class, 'store']);
    Route::get('/ticket/{id}',[TicketsController::class, 'show'])->name('singleTicket');
    Route::get('/ticket/{id}/edit',[TicketsController::class, 'edit'])->middleware(['admin']);
    Route::patch('/ticket/{id}',[TicketsController::class, 'update'])->middleware(['admin']);    
    Route::put('/ticket/{id}',[TicketsController::class, 'closeTicket']);
    Route::delete('/ticket/{id}/delete',[TicketsController::class, 'destroy']);
});

// users route
Route::middleware(['auth', 'verified', 'admin'])->prefix('dashboard')->group(function(){
    Route::get('/user',[UserController::class, 'index'])->name('user');    
    Route::get('/user/create',[UserController::class, 'create'])->name('createUser');    
    Route::post('/user',[UserController::class, 'store'])->name('storeUser');    
    Route::get('/user/{id}',[UserController::class, 'show'])->name('showUser');
    Route::get('/user/{id}/edit',[UserController::class, 'edit']);    
    Route::put('/user/{id}',[UserController::class, 'update'])->name('updateUser');    
    Route::delete('/user/{id}/delete',[UserController::class, 'destroy'])->name('deleteUser');    
    
    Route::resource('/department', DepartmentController::class, ['except' => 'show']);
});    


/*
GET|HEAD   department ...........       department.index › departmentController@index  
POST       department ...........       department.store › departmentController@store  
GET|HEAD   department/create ....       department.create › departmentController@create  
GET|HEAD   department/{category}        department.show › departmentController@show  
PUT|PATCH  department/{category}        department.update › departmentController@update  
DELETE     department/{category}        department.destroy › departmentController@destroy  
GET|HEAD   department/{category}/edit . department.edit › departmentController@edit 
*/


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
