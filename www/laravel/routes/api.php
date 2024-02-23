<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    LoginController,
    InventoryController
};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(["prefix" => 'auth'], function(){
    Route::post("/in", [LoginController::class, "login"]);
});

Route::group(["prefix" => 'inventory'], function(){
    Route::post("/add", [InventoryController::class, "add"]);
    Route::post("/edit", [InventoryController::class, "edit"]);
    Route::post("/del", [InventoryController::class, "del"]);
    Route::get("/show", [InventoryController::class, "show"]);
    Route::get("/get/{id}", [InventoryController::class, "get"]);
    Route::post("/buy", [InventoryController::class, "buy"]);
});