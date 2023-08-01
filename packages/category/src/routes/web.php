<?php

use QH\Category\Http\Controllers\CategoryController;


Route::middleware(['auth', 'web', 'role:admin'])->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::prefix('category')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
            Route::get('add', [CategoryController::class, 'create'])->name('admin.category.add_category');
            Route::post('add', [CategoryController::class, 'store']);
            Route::get('edit/{id}', [CategoryController::class, 'show'])->name('admin.category.edit_category');
            Route::put('edit/{id}', [CategoryController::class, 'update']);
            Route::delete('destroy/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
            // Route::get('destroy', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
        });
    });
});
