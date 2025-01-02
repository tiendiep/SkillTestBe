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








Route::middleware(['auth:api'])->group(function () {
    Route::get('products', [ProductController::class, 'index']);
    Route::get('products/{id}', [ProductController::class, 'show']); 
    
   
    Route::post('products/search', [ProductController::class, 'search']); 
    

  
    Route::get('cart', [CartController::class, 'getCartItemsForUser']); 
    Route::post('cart', [CartController::class, 'addToCart']);
    Route::put('cart/{id}', [CartController::class, 'updateCartQuantity']); 
    Route::delete('cart/{id}', [CartController::class, 'removeFromCart']);

    
    Route::post('checkout', [OrderController::class, 'createOrder']); 
});
