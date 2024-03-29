<?php

use App\Http\Controllers\Item\ItemManagementController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:api'], function () {
    Route::apiResource('item', ItemManagementController::class);
});