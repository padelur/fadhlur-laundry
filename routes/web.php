<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\PaymentController as AdminPaymentController;
use App\Http\Controllers\Admin\ReportController as AdminReportController;
use App\Http\Middleware\RoleAdmin;

// Halaman depan
Route::get('/', fn () => view('home'))->name('home');


Route::get('/services', [ServiceController::class, 'index'])->name('services.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/orders',        [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/history', [OrderController::class, 'history'])->name('orders.history');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');

});

// Auth routes untuk tamu (belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login',    [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login',   [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
    Route::post('/register',[AuthController::class, 'register']);
});

// Auth routes untuk yang sudah login
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Admin Area (hanya untuk yang role-nya admin)
Route::middleware(['auth', RoleAdmin::class])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Layanan (CRUD)
    Route::resource('/services', AdminServiceController::class)->names('services');

    // Pesanan (CRUD)
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::patch('/orders/{id}/status', [AdminOrderController::class, 'updateStatus'])->name('orders.updateStatus');
    Route::get('/orders/{id}', [AdminOrderController::class, 'show'])->name('orders.show');

    Route::get('/payments', [AdminPaymentController::class, 'index'])->name('payments.index');
    Route::get('/payments/{id}', [AdminPaymentController::class, 'show'])->name('payments.show');
    Route::patch('/payments/{id}/verify', [AdminPaymentController::class, 'verify'])->name('payments.verify');
    Route::get('/reports', [AdminReportController::class, 'index'])->name('reports.index');




});
