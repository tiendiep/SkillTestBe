<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchProductController;
use App\Http\Controllers\ManagerProductController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('refresh', [AuthController::class, 'refresh']);
Route::post('me', [AuthController::class, 'me']);
});





// Route::middleware(['auth:api'])->group(function () {
//     // Route cho admin
//     Route::middleware('role:admin')->group(function () {
//         Route::get('users', [MemberController::class, 'index'])->name('users.index');
//         Route::get('users/create', [CreateController::class, 'create'])->name('users.create');
//         Route::post('users', [CreateController::class, 'store'])->name('users.store');
//         Route::delete('users/{id}', [DeleteController::class, 'destroy'])->name('users.destroy');
//     });
//     Route::middleware('role:admin,manager')->group(function () {
//         Route::get('users/{id}/edit', [EditController::class, 'edit'])->name('users.edit');
//         Route::put('users/{id}', [EditController::class, 'update'])->name('users.update');
//     });

//     // Route cho user, admin, manager
//     Route::middleware('role:user,admin,manager')->get('users/search', [SearchController::class, 'search'])->name('users.search');
// });



Route::middleware(['auth:api'])->group(function () {
    Route::get('products', [ProductController::class, 'index']);
    Route::get('products/{id}', [ProductController::class, 'show']); 
    
   
    Route::post('products/search', [SearchProductController::class, 'searchByBrand']); 
    Route::post('products/search/price', [SearchProductController::class, 'searchByPrice']); 

  
    Route::get('cart', [CartController::class, 'getCartItemsForUser']); 
    Route::post('cart', [CartController::class, 'addToCart']);
    Route::put('cart/{id}', [CartController::class, 'updateCartQuantity']); 
    Route::delete('cart/{id}', [CartController::class, 'removeFromCart']);

    
    Route::post('checkout', [OrderController::class, 'createOrder']); 
});
