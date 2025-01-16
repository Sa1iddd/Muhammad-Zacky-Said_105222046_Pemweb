<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SchedulerController;


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

Route::post('auth', [AuthController::class, 'auth'])->name('auth');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


// akses event dengan 127.0.0.1:8000/event
Route::prefix('event')->name('event.')->group(function(){
    Route::get('/', [SchedulerController::class, 'home'])->name('home');
    Route::post('submit', [SchedulerController::class, 'submit'])->name('submit');
    Route::put('update', [SchedulerController::class, 'update'])->name('update');
    Route::post('delete', [SchedulerController::class, 'delete'])->name('delete');
    Route::get('get-json', [SchedulerController::class, 'getJson'])->name('get-json');
});



