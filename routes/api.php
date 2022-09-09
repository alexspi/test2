<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Support\Facades\Route;


Route::get('/cat', [ApiController::class,'getCat']);
Route::get('/coffee', [ApiController::class,'getCoffee']);
