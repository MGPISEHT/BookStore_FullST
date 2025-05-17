<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\APIAuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Api\APICategoryController;
use App\Http\Controllers\Api\BookApiController;
use App\Http\Controllers\Api\APIOrderController;
use App\Http\Controllers\Api\APIPaymentController;
use App\Http\Controllers\Api\APIManageMapController;
use App\Http\Controllers\Api\APIShippingAddressController;
use App\Http\Controllers\Api\APIUserController;



// Authentication APIs
Route::controller(APIAuthController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/register', 'register');
    // ប្រើ middleware auth:sanctum ដើម្បីការពារ API logout
    Route::post('/logout', 'logout')->middleware('auth:sanctum');
});

// User management
Route::controller(APIUserController::class)->group(function () {
    Route::get('/users', 'getUsers');
    Route::post('/users/register', 'registerUser');
    Route::get('/users/{id}', 'show');
    Route::put('/users/update/{id}', 'update');
    Route::delete('/users/delete/{id}', 'destroy');
});

// Categories
Route::controller(APICategoryController::class)->group(function () {
    Route::get('/categories', 'getcategories');
    Route::post('/categories/add-category',  'addCategory');
    Route::get('/categories/edit-category/{id}',  'editCategory');
    Route::put('/categories/update-category/{id}',  'updateCategory');
    Route::delete('/categories/delete-category/{id}',  'destroyCategory');
});



// Books
Route::controller(BookApiController::class)->group(function () {
    Route::get('/books', 'getBooks');        // List all books
    Route::post('/books', 'store');           // Create new book
    Route::get('/books/{id}', 'show');        // Show single book details
    Route::put('/books/{id}', 'update');      // Update a book
    Route::delete('/books/{id}', 'destroy');  // Delete a book
});

// Orders
Route::controller(APIOrderController::class)->group(function () {
    Route::get('/orders',  'getOrders');
    Route::post('/orders/store',  'store');
    Route::get('/orders/edit/{id}',  'edit');
    Route::put('/orders/update/{id}',  'update');
    Route::delete('/orders/delete/{id}',  'destroy');
});

// Payments
Route::controller(APIPaymentController::class)->group(function () {
    Route::get('/payment',  'getPayments');
    Route::post('/payment/store',  'store');
    Route::get('/payment/edit/{id}',  'edit');
    Route::put('/payment/update/{id}',  'update');
    Route::delete('/payment/delete/{id}',  'destroy');
});

// Shipping Addresses
Route::controller('auth:sanctum')->prefix('shipping-addresses')->group(function () {
    Route::get('/', [APIShippingAddressController::class, 'indexShipping']);
    Route::post('/', [APIShippingAddressController::class, 'store']);
    Route::get('/{id}', [APIShippingAddressController::class, 'show']);
    Route::put('/{id}', [APIShippingAddressController::class, 'update']);
    Route::delete('/{id}', [APIShippingAddressController::class, 'destroy']);
});

// Map Management
Route::controller('auth:sanctum')->prefix('manage-map')->group(function () {
    Route::get('/', [APIManageMapController::class, 'index']);
});




Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
