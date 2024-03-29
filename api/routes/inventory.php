<?php

use App\Http\Controllers\Inventory\InventoryManagementController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:api'], function () {
    Route::apiResource('inventory', InventoryManagementController::class);
});