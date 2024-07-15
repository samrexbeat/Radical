<?php

use App\Http\Controllers\BookController;
use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::apiResource('book', BookController::class);