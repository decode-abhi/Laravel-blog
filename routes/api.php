<?php

use App\Http\Controllers\Api\EventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/store',[EventController::class,'store']);
Route::get('/index',[EventController::class,'index']);
Route::post('/update/{id}',[EventController::class,'update']);
Route::get('/show/{id}',[EventController::class,'show']);
Route::get('/delete/{id}',[EventController::class,'destroy']);