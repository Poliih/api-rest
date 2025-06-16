<?php

use App\Http\Controllers\AnimeController;
use Illuminate\Support\Facades\Route;

Route::apiResource('animes', AnimeController::class)->only(['index', 'show']);


Route::get('/debug', function () {
    return response()->json(['rota_api_carregada' => true]);
});


