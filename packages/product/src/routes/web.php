<?php

use QH\Product\Http\Controllers\UploadController;
use QH\Product\Http\Controllers\ProductController;

Route::middleware(['auth', 'web', 'role:admin'])->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::prefix('products')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('admin.products.index');
            Route::get('add', [ProductController::class, 'create'])->name('admin.products.add_product');
            Route::post('add', [ProductController::class, 'store']);
            Route::get('edit/{id}', [ProductController::class, 'show'])->name('admin.products.edit_product');
            Route::put('edit/{id}', [ProductController::class, 'update']);
            Route::delete('destroy/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
        
            
        });
        // Upload image
        Route::post('/upload/services', [UploadController::class, 'store']);
    });
});