<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\UserController;
use app\Http\Controllers\PostController;

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

//public routes
Route::Get('/posts', [PostController::class, 'index']);
Route::Get('/posts/{id}', [PostController::class, 'show']);
Route::Post('/login', [UserController::class, 'login']);
Route::Post('/register', [UserController::class, 'register']);


//protected routes
Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::Post('/posts', [PostController::class, 'store']);
    Route::Put('/post/{id}', [PostController::class, 'update']);
    Route::Delete('/post/{id}', [PostController::class, 'destroy']);
    Route::Get('/logout', [UserController::class, 'logout']);
});