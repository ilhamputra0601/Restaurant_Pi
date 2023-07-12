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
// home
Route::get('/', [HomeController::class,"index"])->name('home');
Route::get('/redirects', [HomeController::class,"redirects"]);

// payment
Route::get('/showpay/{id}', [HomeController::class,"showpay"]);
Route::post('/updatepay/{id}', [AdminController::class,"updatepay"]);

// AddCart
Route::post('/addcart/{id}', [HomeController::class,"addcart"]);
Route::get('/showcart/{id}', [HomeController::class,"showcart"]);
Route::get('/deletecart/{id}', [HomeController::class,"deletecart"]);
Route::post('/orderconfirm', [HomeController::class,"orderconfirm"]);

//order
Route::get('/orders', [AdminController::class,"orders"]);
Route::get('/ordershow/{user_id}', [AdminController::class,"ordershow"]);
Route::get('/deleteorder/{user_id}', [AdminController::class,"deleteorder"]);
Route::get('/deletepay/{id}', [HomeController::class,"deletepay"]);
Route::get('/search', [AdminController::class,"search"]);

// User
Route::get('/users', [AdminController::class,"user"]);
Route::get('/deleteuser/{id}', [AdminController::class,"deleteuser"]);

// Menu
Route::get('/foodmenu', [AdminController::class,"foodmenu"]);
Route::post('/uploadfood', [AdminController::class,"upload"]);
Route::post('/update/{id}', [AdminController::class,"update"]);
Route::get('/viewmenu/{id}', [AdminController::class,"viewfood"]);
Route::get('/deletemenu/{id}', [AdminController::class,"deletefood"]);

// Reservation
Route::post('/reservation', [AdminController::class,"reservation"]);
Route::get('/viewreservation', [AdminController::class,"viewreservation"]);
Route::get('/deletereservation/{id}', [AdminController::class,"deletereservation"]);

// Chef
Route::get('/viewchef', [AdminController::class,"viewchef"]);
Route::post('/createchef', [AdminController::class,"createchef"]);
Route::get('/showchef/{id}', [AdminController::class,"showchef"]);
Route::post('/updatechef/{id}', [AdminController::class,"updatechef"]);
Route::get('/deletechef/{id}', [AdminController::class,"deletechef"]);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
