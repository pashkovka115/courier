<?php

use Illuminate\Support\Facades\Route;

Route::prefix('')->group(function (){
    Route::get('', [\App\Http\Controllers\ProcessController::class, 'index'])->name('front.home.index');
    Route::post('', [\App\Http\Controllers\ProcessController::class, 'store'])->name('front.home.store');
    Route::get('edit/{id}', [\App\Http\Controllers\ProcessController::class, 'edit'])->name('front.home.edit');
    Route::get('destroy/{id}', [\App\Http\Controllers\ProcessController::class, 'destroy'])->name('front.home.destroy');
    Route::post('update/{id}', [\App\Http\Controllers\ProcessController::class, 'update'])->name('front.home.update');
});
