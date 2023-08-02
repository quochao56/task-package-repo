<?php

use QH\Order\Http\Controllers\PurchaseController;

Route::middleware(['auth', 'web', 'role:admin'])->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::prefix('orders')->group(function () {
            Route::get('/', [PurchaseController::class, 'index'])->name('admin.orders.index');
            Route::post('/add-product', [PurchaseController::class, 'create'])->name('admin.orders.add_product');
            Route::get('/list', [PurchaseController::class, 'list'])->name('admin.orders.list');
            // Route::post('add', [CategoryController::class, 'store']);
            Route::get('/detail/{id}', [PurchaseController::class, 'detail'])->name('admin.orders.detail');
            Route::get('destroy/{id}', [PurchaseController::class, 'destroy'])->name('admin.orders.destroy');

            Route::post('/update', [PurchaseController::class, 'update'])->name('admin.orders.update');
            Route::post('/add', [PurchaseController::class, 'store']);
        });
    });
});