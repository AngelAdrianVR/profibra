<?php

use App\Http\Controllers\InventoryController;
use App\Http\Controllers\InventoryMovementController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RequisitionController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::resource('user', UserController::class)->except('show')->middleware('auth');
Route::resource('catalogue', ProductController::class)->except('destroy')->middleware('auth')->parameters(['catalogue' => 'product']);
Route::post('product/delete', [ProductController::class, 'destroy'])->name('product.delete')->middleware('auth');
Route::resource('inventory', InventoryController::class)->except('destroy')->middleware('auth');
Route::resource('movements', InventoryMovementController::class)->middleware('auth');
Route::resource('requisitions', RequisitionController::class)->middleware('auth');

Route::put('user/toggle-activation/{user}', [UserController::class, 'toggleActivation'])->name('user.toggle-activation')->middleware('auth');
Route::post('inventory/delete', [InventoryController::class, 'destroy'])->name('inventory.delete')->middleware('auth');
Route::get('inventory/consumables-report', [InventoryController::class, 'generateConsumablesReport'])->name('inventory.generate-consumables-report')->middleware('auth');
