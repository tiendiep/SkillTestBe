<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;

use App\Http\Controllers\ManagerProductController;
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

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
// Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// sua loginadd

Route::get('products', [ManagerProductController::class, 'index'])->name('products.index'); // List all products
    Route::get('products/create', [ManagerProductController::class, 'create'])->name('products.create'); // Show form to create a product
    Route::post('products', [ManagerProductController::class, 'store'])->name('products.store'); // Store a new product
    Route::get('products/{id}/edit', [ManagerProductController::class, 'edit'])->name('products.edit'); // Show form to edit product
    Route::put('products/{id}', [ManagerProductController::class, 'update'])->name('products.update'); // Update a product
    Route::delete('products/{id}', [ManagerProductController::class, 'destroy'])->name('products.destroy');