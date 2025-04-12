<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::middleware(['auth'])->group(function () {
    // Dashboard routes
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/domains', [DashboardController::class, 'storeDomain'])->name('domains.store');
    Route::put('/domains/{domain}', [DashboardController::class, 'updateDomain'])->name('domains.update');
    Route::delete('/domains/{domain}', [DashboardController::class, 'deleteDomain'])->name('domains.delete');

    // Plan routes
    Route::get('/plans', [PlanController::class, 'index'])->name('plans');
    Route::post('/plans/change', [PlanController::class, 'changePlan'])->name('plans.change');


    Route::get('/users', [UserController::class, 'index'])->name('users')->middleware( AdminMiddleware::class);

});

require __DIR__.'/auth.php';
