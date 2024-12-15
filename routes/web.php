<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

// Route::get('locale/{locale}', [MainController::class, 'index'])->name('locale');
Route::get('locale/{locale}', [MainController::class, 'changelocale'])->name('locale');

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('score/{id}', [MainController::class, 'score'])->name('score');
Route::get('start', [GameController::class, 'start'])->name('start');
Route::get('name', [GameController::class, 'name'])->name('name');
Route::post('nameing', [GameController::class, 'nameing'])->name('nameing');
Route::get('nameDel', [GameController::class, 'nameDel'])->name('nameDel');
Route::get('game/{id}', [GameController::class, 'game'])->name('game');
Route::get('time/{id}', [GameController::class, 'time'])->name('time');
Route::get('selecting/{id}/{sel}', [GameController::class, 'selecting'])->name('selecting');
Route::get('win/{id}', [GameController::class, 'win'])->name('win');
Route::get('next/{id}', [GameController::class, 'next'])->name('next');
Route::get('finish/{id}', [GameController::class, 'finish'])->name('finish');

Route::get('like/{id}/{like}/{lvl}', [GameController::class, 'like'])->name('like');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

	Route::get ('admin/girls', [AdminController::class, 'girls'])->name('admin_girls');
		Route::post ('admin/girlsAdding', [AdminController::class, 'girlsAdding'])->name('admin_girlsAdding');


});