<?php

use App\Http\Controllers\Api\MonitorController;
use App\Http\Middleware\LaravelWebsiteMonitorClientMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->middleware([LaravelWebsiteMonitorClientMiddleware::class])->group(function (): void {
    Route::post('monitor', [MonitorController::class, 'save']);
});
