<?php

use App\Http\Controllers\ProfileController;
// Add controllers for your new pages here if you create them
// use App\Http\Controllers\UserController;
// use App\Http\Controllers\SettingsController;
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

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile Routes (existing)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- Add your new routes here ---

    // Example 1: Simple page using a closure
    Route::get('/reports', function () {
        // You can pass data to the Vue component if needed
        $reportData = ['title' => 'Monthly Report', 'value' => 123];
        return Inertia::render('Reports', ['reports' => $reportData]);
    })->name('reports.index'); // Give it a name for easy linking

    // Example 2: Users page (using a hypothetical UserController)
    // Recommended for more complex pages
    // Route::get('/users', [UserController::class, 'index'])->name('users.index');

    // Example 3: Settings page
    Route::get('/settings', function () {
        return Inertia::render('Settings');
    })->name('settings.index');

});

require __DIR__.'/auth.php';