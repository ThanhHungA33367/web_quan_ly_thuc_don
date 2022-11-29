<?php

use App\Http\Controllers\DishController;
use App\Http\Controllers\DishTypeController;
use App\Http\Controllers\MealController;
use Illuminate\Support\Facades\Route;

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
    return view('page.welcomepage');
});
Route::get('/layout', function () {
    return view('layout');
});
Route::get('/dish', [DishController::class, 'index'])->name('dish.index');
Route::get('/dish_type', [DishTypeController::class, 'index'])->name('dish_type.index');
