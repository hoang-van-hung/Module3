<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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


Route::prefix('admin')->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/create', [UserController::class, 'store'])->name('users.store');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/{id}/edit', [UserController::class, 'update'])->name('users.edit');
        Route::get('/{id}/delete', [UserController::class, 'delete'])->name('users.delete');
    });

    Route::prefix('products')->group(function () {
        Route::get('/',[ProductController::class,'index'])->name('products.index');
        Route::get('create',[ProductController::class,'create'])->name('products.create');
        Route::post('create',[ProductController::class,'store'])->name('products.store');
        Route::get('/{id}/edit',[ProductController::class,'edit'])->name('products.edit');
        Route::post('/{id}/edit',[ProductController::class,'update'])->name('products.update');
        Route::get('/{id}/delete',[ProductController::class,'delete'])->name('products.delete');
    });
    Route::prefix('customers')->group( function () {
        Route::get('',[CustomerController::class,'index'])->name('customer.index');
        Route::get('create',[CustomerController::class,'create'])->name('customer.create');
        Route::post('create',[CustomerController::class,'store'])->name('customer.store');
        Route::get('/{id}/edit',[CustomerController::class,'edit'])->name('customer.edit');
        Route::post('/{id}/edit',[CustomerController::class,'update'])->name('customer.update');
        Route::get('/{id}/delete',[CustomerController::class,'delete'])->name('customer.delete');
    });
    Route::prefix('employees')->group(function () {
        Route::get('',[EmployeeController::class,'index'])->name('employee.index');
        Route::get('create',[EmployeeController::class,'create'])->name('employee.create');
        Route::post('create',[EmployeeController::class,'store'])->name('employee.store');
        Route::get('/{id}/edit',[EmployeeController::class,'edit'])->name('employee.edit');
        Route::post('/{id}/edit',[EmployeeController::class,'update'])->name('employee.update');
        Route::get('/{id}/delete',[EmployeeController::class,'delete'])->name('employee.delete');
    });

});

Route::get('/',[\App\Http\Controllers\frontend\HomeController::class,'index'])->name('home.index');
Route::get('cart/{id}/add-to-cart', [CartController::class, 'addToCart'])->name('cart.addToCart');
Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::get('cart/{id}/remove-products', [CartController::class, 'removeProduct'])->name('cart.removeProduct');
Route::post('cart/update',[CartController::class, 'updateCart'])->name('cart.update');
Route::get('cart/delete',[CartController::class,'deleteCart'])->name('cart.delete');

Route::get('check_out',[CartController::class,'showFormCheckOut'])->name('cart.show_form');
Route::post('check_out',[CartController::class,'checkOut'])->name('cart.submit');



Route::get('register', [AuthController::class, 'showFormRegister'])->name('auth.showFormRegister');
