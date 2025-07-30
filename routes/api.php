<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('/users')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::post('/', [UserController::class, 'store']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
    Route::post('/login', [UserController::class, 'login']);
});

Route::prefix('/roles')->group(function () {
    Route::get('/', [RoleController::class, 'index']);
});

Route::prefix('/categories')->group(function () {
    Route::get('/', [CategorieController::class, "index"]);
    Route::post('/', [CategorieController::class, "store"]);
    Route::put('/{id}', [CategorieController::class, "update"]);
    Route::delete('/{id}', [CategorieController::class, "delete"]);
});

Route::prefix('/produits')->group(function () {
    Route::get('/', [ProduitController::class, "index"]);
    Route::get('/{id}', [ProduitController::class, "show"]);
    Route::post('/', [ProduitController::class, "store"]);
    Route::put('/{id}', [ProduitController::class, "update"]);
    Route::delete('/{id}', [ProduitController::class, "destroy"]);
    Route::get("image/{name}", [ProduitController::class, "getImage"]);
    Route::post('image/{id}', [ProduitController::class, "addImage"]);
    Route::delete('image/{id}', [ProduitController::class, "deleteImage"]);
});
