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
Route::get('/meal', [DishTypeController::class, 'index'])->name('meal.index');
Route::get('/children_type', [DishTypeController::class, 'index'])->name('children_type.index');
Route::get('/ingredients', [DishTypeController::class, 'index'])->name('ingredients.index');
Route::get('/ingredient_type', [DishTypeController::class, 'index'])->name('ingredient_type.index');



