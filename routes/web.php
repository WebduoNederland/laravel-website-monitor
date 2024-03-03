<?php

use App\Http\Controllers\LogoutController;
use App\Livewire\App\Dashboard;
use App\Livewire\App\Websites;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('logout', LogoutController::class)
    ->name('logout');

Route::middleware(['guest'])->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::middleware(['auth'])->prefix('app')->group(function () {
    Route::get('dashboard', Dashboard::class)
        ->name('dashboard');

    Route::get('websites', Websites::class)
        ->name('websites');
});
