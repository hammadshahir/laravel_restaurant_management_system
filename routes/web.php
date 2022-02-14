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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
