<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Resources\CoffeeResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/cat', [ApiController::class,'getCat']);

Route::get('/coffee', function () {
    return  CoffeeResource::collection(Coffee::all())
        ->response();
//        ->header('X-Value', 'True');
});