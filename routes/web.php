<?php

use App\Http\Controllers\Dashboard\AccountingController;
use App\Http\Controllers\Dashboard\CalendarController;
use App\Http\Controllers\Dashboard\CustomerController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ExpenseController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SetupController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
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

Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

Route::get('/setup', [SetupController::class, 'index'])->name('setup.index');
Route::post('/setup', [SetupController::class, 'store'])->name('setup.store');
Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::prefix('customers')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('dashboard.customers.index');
        Route::get('/new', [CustomerController::class, 'create'])->name('dashboard.customers.create');
        Route::post('/store', [CustomerController::class, 'store'])->name('dashboard.customers.store');
        Route::get('/{customer}', [CustomerController::class, 'show'])->name('dashboard.customers.show');
        Route::get('/{customer}/edit', [CustomerController::class, 'edit'])->name('dashboard.customers.edit');
        Route::put('/{customer}/update', [CustomerController::class, 'update'])->name('dashboard.customers.update');
        Route::delete('/{customer}/delete', [CustomerController::class, 'destroy'])->name('dashboard.customers.delete');
    });

    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('dashboard.products.index');
        Route::get('/new', [ProductController::class, 'create'])->name('dashboard.products.create');
        Route::post('/store', [ProductController::class, 'store'])->name('dashboard.products.store');
        Route::get('/{product}', [ProductController::class, 'show'])->name('dashboard.products.show');
        Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('dashboard.products.edit');
        Route::put('/{product}/update', [ProductController::class, 'update'])->name('dashboard.products.update');
        Route::delete('/{product}/delete', [ProductController::class, 'destroy'])->name('dashboard.products.delete');
    });

    Route::prefix('orders')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('dashboard.orders.index');
        Route::get('/new', [OrderController::class, 'create'])->name('dashboard.orders.create');
        Route::post('/store', [OrderController::class, 'store'])->name('dashboard.orders.store');
        Route::get('/{order}', [OrderController::class, 'show'])->name('dashboard.orders.show');
        Route::get('/{order}/edit', [OrderController::class, 'edit'])->name('dashboard.orders.edit');
        Route::put('/{order}/update', [OrderController::class, 'update'])->name('dashboard.orders.update');
        Route::delete('/{order}/delete', [OrderController::class, 'destroy'])->name('dashboard.orders.delete');
    });

    Route::prefix('expenses')->group(function () {
        Route::get('/', [ExpenseController::class, 'index'])->name('dashboard.expenses.index');
        Route::get('/new', [ExpenseController::class, 'create'])->name('dashboard.expenses.create');
        Route::post('/store', [ExpenseController::class, 'store'])->name('dashboard.expenses.store');
        Route::get('/{expense}', [ExpenseController::class, 'show'])->name('dashboard.expenses.show');
        Route::put('/{expense}/update', [ExpenseController::class, 'update'])->name('dashboard.expenses.update');
        Route::delete('/{expense}/delete', [ExpenseController::class, 'destroy'])->name('dashboard.expenses.delete');
    });

    Route::prefix('calendar')->group(function () {
        Route::get('/', [CalendarController::class, 'index'])->name('dashboard.calendar.index');
    });

    Route::prefix('accounting')->group(function () {
        Route::get('/', [AccountingController::class, 'index'])->name('dashboard.accounting.index');
        Route::get('/{filter}', [AccountingController::class, 'show'])->name('dashboard.accounting.show');
    });
});
