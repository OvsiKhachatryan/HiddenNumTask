<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FindNumberController;

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

Route::get('/', [FindNumberController::class, 'index'])->name('welcome');
Route::post('/find-hidden-number', [FindNumberController::class, 'findHiddenNumber'])->name('find-hidden-number');
