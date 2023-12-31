<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FieldOfPracticeController;
use App\Http\Controllers\PracticeController;
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

// home public
Route::get('/', function () {
    return view('home');
});

// admin routes
Route::middleware('auth')->group(function () {
    Route::resources([
        'practices' => PracticeController::class,
        'employees' => EmployeeController::class,
        'fields-of-practice' => FieldOfPracticeController::class,
    ]);
});


require __DIR__.'/auth.php';
