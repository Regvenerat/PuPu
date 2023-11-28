<?php

use Illuminate\Support\Facades\Route;

Route::get('locale/{locale}', [MainController::class, 'index'])->name('locale');

Route::get('/', [MainController::class, 'index'])->name('index');


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

	Route::get ('store/canAdd', [StoreController::class, 'canAdd'])->name('store-canAdd');


});