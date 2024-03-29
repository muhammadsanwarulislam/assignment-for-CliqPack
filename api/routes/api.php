<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Core\Auth\AuthController;
use App\Http\Controllers\Core\Role\RoleManagmentController;
use App\Http\Controllers\Core\Permission\PermissionManagmentController;
use App\Http\Controllers\Core\User\UserManagementController;

// Backend API
/*
    Common API for Backend and Frontend
*/
Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/current-user', [AuthController::class, 'authorizedUserInformation']);
    
    // Logout
    Route::post('/logout', [AuthController::class, 'logout']);
});