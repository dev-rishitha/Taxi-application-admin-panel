<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Middleware\AdminAuthenticate;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\VehicleTypeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\FareController;
use Inertia\Inertia;

// Admin Login Routes
Route::get('/', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');

// Admin Logout Route
Route::get('/admin/logout', function () {
    session()->forget('admin_logged_in');
    session()->flush();
    return redirect()->route('admin.login')->with('success', 'Logged out successfully.');
})->name('admin.logout');

// Protected Admin Dashboard and Panel Routes using middleware class
Route::middleware([AdminAuthenticate::class])->group(function () {
    Route::view('/admin/dashboard', 'AdminDashboard')->name('admin.dashboard');
    Route::view('/live-rides', 'LiveRides')->name('live.rides');

    // Customer resource routes
    Route::resource('customers', CustomerController::class);
    Route::get('/customers-suggestions', [CustomerController::class, 'suggestions'])->name('customers.suggestions');

    // Custom customer management actions
    Route::get('/customers/{id}/history', [CustomerController::class, 'history'])->name('customers.history');
    Route::get('/customers/{id}/notify', [CustomerController::class, 'notify'])->name('customers.notify');
    // Handle notification submission
    Route::post('/customers/{id}/notify', [CustomerController::class, 'sendNotification'])->name('customers.notify.send');
    Route::post('/customers/{id}/block', [CustomerController::class, 'block'])->name('customers.block');
    Route::post('/customers/{id}/unblock', [CustomerController::class, 'unblock'])->name('customers.unblock');

    //  Driver resource routes
    Route::resource('drivers', DriverController::class)->except(['destroy']);
    Route::get('/drivers', [DriverController::class, 'index'])->name('drivers.index');
    Route::post('/drivers/{driver}/change-status', [DriverController::class, 'changeStatus'])->name('drivers.changeStatus');
    Route::get('/drivers/{driver}', [DriverController::class, 'show'])->name('drivers.show');
    Route::get('/drivers/{driver}/edit', [DriverController::class, 'edit'])->name('drivers.edit');
    Route::post('/drivers/{id}/block', [DriverController::class, 'block'])->name('drivers.block');
    Route::post('/drivers/{id}/unblock', [DriverController::class, 'unblock'])->name('drivers.unblock');
    Route::get('/drivers/{driver}/assign-cab', [DriverController::class, 'assignCabForm'])->name('drivers.assignVehicle');
    Route::post('/drivers/{driver}/assign-cab', [DriverController::class, 'assignCab']);
    Route::get('/drivers/{id}/history', [DriverController::class, 'history'])->name('drivers.history');
    Route::post('/drivers/{driver}/suspend', [DriverController::class, 'suspend'])->name('drivers.suspend');

    Route::view('/ambulance-company', 'AmbulanceCompany')->name('ambulance.company');
    Route::view('/manage-service-category', 'ManageServices')->name('manage.services');

    // Manufacturers Routes
    Route::get('/manufactures', [ManufacturerController::class, 'index'])->name('manufacturers.index');
    Route::get('/manufacturers/{id}', [ManufacturerController::class, 'show'])->name('manufacturers.show');
    Route::get('/manufacturers/{id}/edit', [ManufacturerController::class, 'edit'])->name('manufacturers.edit');
    Route::put('/manufacturers/{id}', [ManufacturerController::class, 'update'])->name('manufacturers.update');
    Route::post('/manufacturers/{id}/disable', [ManufacturerController::class, 'disable'])->name('manufacturers.disable');

   // Models (Dynamic Resource Routes)
    Route::resource('models', ModelController::class);

    // Types (Dynamic Resource Routes)
    Route::resource('vehicle-types', VehicleTypeController::class);

    Route::resource('locations', LocationController::class);
    Route::post('/locations/{location}/disable', [LocationController::class, 'disable'])->name('locations.disable');
    Route::get('/locations/{location}/map', [LocationController::class, 'showMap'])->name('locations.map');

    Route::resource('fares', FareController::class);
    Route::get('/drivers-performance', [DriverController::class, 'performance'])->name('drivers.performance');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
