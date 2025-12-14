<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreItemController;

// Public store (view only)
Route::get('/', [StoreItemController::class, 'publicIndex'])->name('store.front');

// Admin area (NO AUTH – just routes)
Route::prefix('admin')->group(function () {
    Route::get('/', [StoreItemController::class, 'adminIndex'])->name('admin.index');
    Route::get('/create', [StoreItemController::class, 'create']);
    Route::post('/store', [StoreItemController::class, 'store']);
    Route::get('/{item}/edit', [StoreItemController::class, 'edit']);
    Route::put('/{item}', [StoreItemController::class, 'update']);
    Route::delete('/{item}', [StoreItemController::class, 'destroy']);
});
