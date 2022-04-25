<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, "index"]);
Route::get('/redirects', [HomeController::class, "redirects"]);
Route::get('/users', [AdminController::class, "user"]);
Route::get('/delete/{id}', [AdminController::class, "delete"]);


Route::get('/foodmenu', [AdminController::class, "foodmenu"]);
Route::post('/insertfood', [AdminController::class, "insertfood"]);
Route::get('/deletemenu/{id}', [AdminController::class, "deletemenu"]);
Route::get('/updateview/{id}', [AdminController::class, "updateview"]);
Route::post('/updatefood/{id}', [AdminController::class, "updatefood"]);


Route::post('/reservations', [AdminController::class, "reservation"]);
Route::get('/viewreservations', [AdminController::class, "viewreservations"]);


Route::get('/chef', [AdminController::class, "viewchef"]);
Route::post('/insertchef', [AdminController::class, "insertchef"]);
Route::get('/updatechef/{id}', [AdminController::class, "updatechef"]);
Route::post('/updatechefrecord/{id}', [AdminController::class, "updatechefrecord"]);
Route::get('/deletechef/{id}', [AdminController::class, "deletechef"]);
Route::get('/vieworders', [AdminController::class, "vieworders"]);

Route::post('/addcart/{id}', [HomeController::class, "add_cart"]);
Route::get('/showcart/{id}', [HomeController::class, "show_cart"]);
Route::get('/remove/{id}', [HomeController::class, "remove_cart_item"]);
Route::post('/confirmorder', [HomeController::class, "confirm_order"]);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
