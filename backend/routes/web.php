<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ManageMapController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ShippingAddressController;
// Ensure UserController is imported
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('auth.login');
});


Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'login')->name('user.login');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('user.register');
});


// Protected route ( user login successful then using /dashboard )
Route::group(['middleware' => ['auth']], function () {
    // គេប្រើប្រាស់ middleware auth ដើម្បីធានាថាអ្នកប្រើប្រាស់ត្រូវបានផ្ទៀងផ្ទាត់មុនពេលចូលទៅកាន់ទំព័រដែលមានឈ្មោះ dashboard
    Route::controller(DashboardController::class)->group(function () {
        // គេប្រើប្រាស់ group ដើម្បីកំណត់ថាអ្នកប្រើប្រាស់ត្រូវបានផ្ទៀងផ្ទាត់មុនពេលចូលទៅកាន់ទំព័រដែលមានឈ្មោះ dashboard
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        // គេប្រើប្រាស់ get ដើម្បីទទួលបានទិន្នន័យពីទំព័រដែលមានឈ្មោះ dashboard
    });
});

// users controller
Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'indexUsers'])->name('users.index');
    Route::post('/', [UserController::class, 'store'])->name('users.store');
    Route::put('/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});


// component controller 
Route::group(['prefix' => 'components'], function () {
    // prefix បញ្ជាក់ថាអ្នកប្រើប្រាស់ត្រូវបានផ្ទៀងផ្ទាត់មុនពេលចូលទៅកាន់ទំព័រដែលមានឈ្មោះ component
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category', 'index')->name('category');
        Route::post('/category/add',  'addCategory')->name('category.add');
        Route::get('category/edit/{id}',  'editCategory')->name('category.edit');
        Route::post('/category/update/{id}',  'updateCategory')->name('category.update');
        Route::delete('/category/delete/{id}',  'destroyCategory')->name('category.delete');
    });
});

// book
Route::group(['prefix' => 'components'], function () {
    Route::controller(BookController::class)->group(function () {
        Route::get('/books', 'indexBook')->name('book.index');
        Route::get('/books/create', 'create')->name('books.create');
        Route::post('/books/store', 'store')->name('books.store');
        Route::put('/books/edit/{id}', 'edit')->name('books.edit');
        Route::post('/books/update/{id}', 'update')->name('books.update');
        Route::delete('/books/delete/{id}', 'destroy')->name('books.delete');
    });
});


// orders
Route::group(['prefix' => 'components'], function () {
    Route::controller(OrderController::class)->group(function () {
        Route::get('/orders', 'indexOrder')->name('orders.index');               
        Route::get('/orders/create', 'create')->name('orders.create');      
        Route::post('/orders/store', 'store')->name('orders.store');      
        Route::get('/orders/edit/{id}', 'edit')->name('orders.edit');       
        Route::put('/orders/update/{id}', 'update')->name('orders.update'); 
        Route::delete('/orders/delete/{id}', 'destroy')->name('orders.delete');
    });
});

// payment
Route::group(['prefix' => 'components'], function () {
    Route::controller(PaymentController::class)->group(function () {
        Route::get('/payments', 'indexPayment')->name('payments.index');               
        Route::get('/payments/create', 'create')->name('payments.create');      
        Route::post('/payments/store', 'store')->name('payments.store');        
        Route::get('/payments/edit/{id}', 'edit')->name('payments.edit');       
        Route::put('/payments/update/{id}', 'update')->name('payments.update');
        Route::delete('/payments/delete/{id}', 'destroy')->name('payments.delete'); 
    });
});

// shipping address
Route::group(['prefix' => 'components'], function () {
    Route::controller(ShippingAddressController::class)->group(function () {
        Route::get('shipping_addresses',  'indexShipping')->name('shipping.index');;
        Route::get('shipping_addresses/create',  'create')->name('shipping.create');;
        Route::post('shipping_addresses',  'store')->name('shipping.store');;
        Route::get('shipping_addresses/{id}',  'show')->name('shipping.show');;
        Route::get('shipping_addresses/{id}/edit',  'edit')->name('shipping.edit');;
        Route::put('shipping_addresses/{id}',  'update')->name('shipping.update');;
        Route::delete('shipping_addresses/{id}',  'destroy')->name('shipping.destroy');;
    });
});
// route for map
Route::group(['prefix' => 'components'], function () {
    Route::controller(ManageMapController::class)->group(function () {
        Route::get('/manage-map', 'index')->name('manageMap.index'); 
    });
});
