<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/onboarding', function () {
    return Inertia::render('Onboarding');
})->name('onboarding');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/workspace', function () {
    return Inertia::render('Dashboard/Workspace');
})->middleware(['auth', 'verified'])->name('workspace');

Route::get('/accounts', function () {
    return Inertia::render('Dashboard/Accounts');
})->middleware(['auth', 'verified'])->name('accounts');

Route::get('/analytics', function () {
    return Inertia::render('Dashboard/Analytics');
})->middleware(['auth', 'verified'])->name('analytics');

Route::get('/engage', function () {
    return Inertia::render('Dashboard/Engage');
})->middleware(['auth', 'verified'])->name('engage');

Route::get('/listening', function () {
    return Inertia::render('Dashboard/Listening');
}) ->middleware(['auth', 'verified'])->name('listening');

Route::get('/calendar', function () {
    return Inertia::render('Dashboard/Calendar');
})->middleware(['auth', 'verified'])->name('calendar');

Route::get('/publish', function () {
    return Inertia::render('Dashboard/Publish');
})->name('publish');
// Route::get('/publish', function () {
//     return Inertia::render('Dashboard/Publish');
// })->middleware(['auth', 'verified'])->name('publish');


Route::get('/google-auth', function () {
    return Inertia::render('GoogleAuth');
})->name('google-auth');

require __DIR__.'/auth.php';
