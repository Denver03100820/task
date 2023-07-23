<?php

use App\Http\Controllers\SiteController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [SiteController::class, 'index'])->name('login');
Route::get('/logout', [SiteController::class, 'logout']);
Route::get('/registration', [SiteController::class, 'registration']);

# Save user registration
Route::post('/register', [UserController::class, 'store']);

# Login user
Route::post('/login', [SiteController::class, 'authenticate']);

Route::middleware(['auth'])->group(function () {
    # Task route
    Route::get('/task', [TaskController::class, 'index']);
    Route::get('/add_task', [TaskController::class, 'create']);
    Route::get('/task/{id}', [TaskController::class, 'edit']);
    Route::get('/delete_task/{id}', [TaskController::class, 'destroy']);
    Route::get('/trash', [TaskController::class, 'trash']);
    
    # Save Task
    Route::post('/save_task', [TaskController::class, 'store']);
    Route::post('/update_task/{id}', [TaskController::class, 'update']);
});




