<?php
use App\Http\Controllers\Api\CraftController;
//use App\Http\Controllers\Api\CraftController;
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
//Route::middleware('auth:api')->get('user_accessible', function (Request $request) {
//    return $request->user();

        Route::post('/login', [CraftController::class, 'login']);
        Route::post('/logout', [CraftController::class, 'logout'])->middleware('auth:api');
        Route::get('/aircrafts', [CraftController::class, 'getAllCrafts'])->middleware('auth:api');
        Route::get('/aircrafts/{id}', [CraftController::class, 'getCraft'])->middleware('auth:api');
        Route::post('/aircrafts', [CraftController::class, 'createCraft'])->middleware('auth:api');
        Route::post('/aircrafts/{id}', [CraftController::class, 'updateCraft'])->middleware('auth:api');
        Route::get('/dequeue', [CraftController::class, 'dequeue'])->middleware('auth:api');
        Route::post('/boot', [CraftController::class, 'boot'])->middleware('auth:api');
//    });



