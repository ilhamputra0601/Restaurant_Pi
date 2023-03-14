<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class,"index"]);
Route::get('/redirects', [HomeController::class,"redirects"]);

Route::get('/users', [AdminController::class,"user"]);
Route::get('/deleteuser/{id}', [AdminController::class,"deleteuser"]);

Route::get('/foodmenu', [AdminController::class,"foodmenu"]);
Route::post('/uploadfood', [AdminController::class,"upload"]);
Route::post('/update/{id}', [AdminController::class,"update"]);
Route::get('/viewmenu/{id}', [AdminController::class,"viewfood"]);
Route::get('/deletemenu/{id}', [AdminController::class,"deletefood"]);

// Route::resource('/foodmenu',FoodController::class)->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
