<?php

use Illuminate\Support\Facades\Route;
use Gdelgado\Quotes\Http\Controllers\QuotesController;

// Route::middleware('throttle:api')->group(function () {
//     Route::prefix('api')->get('quotes-ui', [QuotesController::class, 'getQuote'])->name('quotes');
// });

Route::prefix('api/quotes-ui')->group(function () {
    Route::get('/', [QuotesController::class, 'index']);
    Route::get('/random', [QuotesController::class, 'random']);
    Route::get('/{id}', [QuotesController::class, 'show']);
});