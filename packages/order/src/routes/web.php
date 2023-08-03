<?php

use QH\Order\Http\Controllers\PurchaseController;

Route::middleware(['auth', 'web', 'role:admin'])->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::prefix('orders')->group(function () {
            Route::get('/', [PurchaseController::class, 'index'])->name('admin.orders.index');
            // add product into session
            Route::post('/add-product', [PurchaseController::class, 'create'])->name('admin.orders.add_product');
            Route::get('/list', [PurchaseController::class, 'list'])->name('admin.orders.list');
            // store product into db
            Route::post('/store', [PurchaseController::class, 'store'])->name('admin.orders.store');
            Route::get('/detail/{id}', [PurchaseController::class, 'detail'])->name('admin.orders.detail');
            Route::get('destroy/{id}', [PurchaseController::class, 'destroy'])->name('admin.orders.destroy');

            Route::post('/update', [PurchaseController::class, 'update'])->name('admin.orders.update');
        });
    });
});