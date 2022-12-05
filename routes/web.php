<?php

use App\Http\Controllers\ChildrenTypeController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\DishTypeController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\IngredientTypeController;
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
Route::get('/dish_type/create', [DishTypeController::class, 'create'])->name('dish_type.create');
Route::post('/dish_type/store', [DishTypeController::class, 'store'])->name('dish_type.store');
Route::get('/dish_type/edit/{id}', [DishTypeController::class, 'edit'])->name('dish_type.edit');
Route::put('/dish_type/edit/{id}', [DishTypeController::class, 'update'])->name('dish_type.update');
Route::get('/dish_type/delete', [DishTypeController::class, 'cancel'])->name('dish_type.cancel');

Route::get('/meal', [MealController::class, 'index'])->name('meal.index');
Route::get('/meal/create', [MealController::class, 'create'])->name('meal.create');
Route::post('/meal/store', [MealController::class, 'store'])->name('meal.store');
Route::get('/meal/edit/{id}', [MealController::class, 'edit'])->name('meal.edit');
Route::put('/meal/edit/{id}', [MealController::class, 'update'])->name('meal.update');
Route::get('/meal/delete', [MealController::class, 'cancel'])->name('meal.cancel');

Route::get('/children_type', [ChildrenTypeController::class, 'index'])->name('children_type.index');
Route::get('/children_type/create', [ChildrenTypeController::class, 'create'])->name('children_type.create');
Route::post('/children_type/store', [ChildrenTypeController::class, 'store'])->name('children_type.store');
Route::get('/children_type/edit/{id}', [ChildrenTypeController::class, 'edit'])->name('children_type.edit');
Route::put('/children_type/edit/{id}', [ChildrenTypeController::class, 'update'])->name('children_type.update');
Route::get('/children_type/delete', [ChildrenTypeController::class, 'cancel'])->name('children_type.cancel');

Route::get('/ingredient', [IngredientController::class, 'index'])->name('ingredient.index');

Route::get('/ingredient_type', [IngredientTypeController::class, 'index'])->name('ingredient_type.index');
Route::get('/ingredient_type/create', [IngredientTypeController::class, 'create'])->name('ingredient_type.create');
Route::post('/ingredient_type/store', [IngredientTypeController::class, 'store'])->name('ingredient_type.store');
Route::get('/ingredient_type/edit/{id}', [IngredientTypeController::class, 'edit'])->name('ingredient_type.edit');
Route::put('/ingredient_type/edit/{id}', [IngredientTypeController::class, 'update'])->name('ingredient_type.update');
Route::get('/ingredient_type/delete', [IngredientTypeController::class, 'cancel'])->name('ingredient_type.cancel');





