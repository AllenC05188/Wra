<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusinessManagerController;

Route::get('/', [BusinessManagerController::class, 'index']);

Route::post('/create-child-bm', [BusinessManagerController::class, 'createChildBM'])->name('facebook.createChildBM');
Route::post('/update-bm/{id}', [BusinessManagerController::class, 'updateBm'])->name('updateBm');
Route::delete('/delete-bm/{id}', [BusinessManagerController::class, 'deleteBm'])->name('deleteBm');


