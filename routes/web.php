<?php

use App\Http\Controllers\ChildrenTypeController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\DishTypeController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\IngredientTypeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\checkAdminLogin;
use Illuminate\Support\Facades\Auth;


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




Route::get('/layout', function () {
    return view('layout');
});
Route::get('/login', [LoginController::class, 'getLogin'])->name('login.index');
Route::post('/login', [LoginController::class, 'postLogin'])->name('login.access');
Route::get('/logout', [LoginController::class, 'Logout'])->name('logout');


Route::get('/register', [RegisterController::class, 'index'])->name('register.index');

Route::post('/register/store', [RegisterController::class, 'store'])->name('register.store');

Route::group(['middleware' => ['checkAdminLogin']], static function () {


    Route::get('/', [UserController::class, 'index'])->name('user.index');

    Route::get('/dish', [DishController::class, 'index'])->name('dish.index');
    Route::get('/dish/create', [DishController::class, 'create'])->name('dish.create');
    Route::get('/dish/create_ingredient_dish/{id}', [DishController::class, 'create_ingredient_dish'])->name('dish.create_ingredient_dish');
    Route::post('/dish/store', [DishController::class, 'store'])->name('dish.store');
    Route::get('/field/create/calendar/{id}', [DishController::class, 'show'])->name('calendar.show');
    Route::post('/dish/store_ingredient_dish', [DishController::class, 'store_ingredient_dish'])->name('dish.store_ingredient_dish');
    //Route::get('/dish/store_ingredient_dish', [DishController::class, 'store_ingredient_dish'])->name('dish.store_ingredient_dish1');

    Route::get('/dish/select/{id}', [DishController::class, 'select'])->name('dish.select');
    Route::get('/select/ingredient_type/{ingredient_type_Id}', [DishController::class, 'getIngredient'])->name('select_ingredient_type');
    Route::get('/dish/edit/{id}', [DishController::class, 'edit'])->name('dish.edit');
    Route::put('/dish/edit/{id}', [DishController::class, 'update'])->name('dish.update');
    Route::get('/dish/delete_ingredient', [DishController::class, 'deleteIngredient'])->name('dish.deleteIngredient');
    Route::get('/dish_type/delete', [DishTypeController::class, 'cancel'])->name('dish_type.cancel');
    //Route::put('/dish/edit_dish_ingredient/{id}', [DishController::class, 'update_ingredient_dish'])->name('edit_dish_ingredient.update');
    //Route::get('/dish/edit_dish_ingredient/{id}', [DishController::class, 'edit_ingredient_dish'])->name('edit_dish_ingredient.edit');


    Route::get('/dish_type', [DishTypeController::class, 'index'])->name('dish_type.index');
    Route::get('/dish_type/create', [DishTypeController::class, 'create'])->name('dish_type.create');
    Route::post('/dish_type/store', [DishTypeController::class, 'store'])->name('dish_type.store');
    Route::get('/dish_type/edit/{id}', [DishTypeController::class, 'edit'])->name('dish_type.edit');
    Route::put('/dish_type/edit/{id}', [DishTypeController::class, 'update'])->name('dish_type.update');
    Route::get('/dish_type/delete', [DishTypeController::class, 'cancel'])->name('dish_type.cancel');


    Route::get('/meal', [MealController::class, 'index'])->name('meal.index');
    Route::group(['middleware' => ['checkUserAcess']], static function () {
        Route::get('/meal/create', [MealController::class, 'create'])->name('meal.create');
        Route::post('/meal/store', [MealController::class, 'store'])->name('meal.store');
        Route::get('/meal/edit/{id}', [MealController::class, 'edit'])->name('meal.edit');
        Route::put('/meal/edit/{id}', [MealController::class, 'update'])->name('meal.update');
        Route::get('/meal/delete', [MealController::class, 'cancel'])->name('meal.cancel');
    });


    Route::get('/children_type', [ChildrenTypeController::class, 'index'])->name('children_type.index');
    Route::get('/children_type/create', [ChildrenTypeController::class, 'create'])->name('children_type.create');
    Route::post('/children_type/store', [ChildrenTypeController::class, 'store'])->name('children_type.store');
    Route::get('/children_type/edit/{id}', [ChildrenTypeController::class, 'edit'])->name('children_type.edit');
    Route::put('/children_type/edit/{id}', [ChildrenTypeController::class, 'update'])->name('children_type.update');
    Route::get('/children_type/delete', [ChildrenTypeController::class, 'cancel'])->name('children_type.cancel');

    Route::get('/ingredient', [IngredientController::class, 'index'])->name('ingredient.index');
    Route::get('/ingredient/create', [IngredientController::class, 'create'])->name('ingredient.create');
    Route::post('/ingredient/store', [IngredientController::class, 'store'])->name('ingredient.store');
    Route::get('/ingredient/edit/{id}', [IngredientController::class, 'edit'])->name('ingredient.edit');
    Route::put('/ingredient/edit/{id}', [IngredientController::class, 'update'])->name('ingredient.update');
    Route::get('/ingredient/delete', [IngredientController::class, 'cancel'])->name('ingredient.cancel');

    Route::get('/ingredient_type', [IngredientTypeController::class, 'index'])->name('ingredient_type.index');
    Route::get('/ingredient_type/create', [IngredientTypeController::class, 'create'])->name('ingredient_type.create');
    Route::post('/ingredient_type/store', [IngredientTypeController::class, 'store'])->name('ingredient_type.store');
    Route::get('/ingredient_type/edit/{id}', [IngredientTypeController::class, 'edit'])->name('ingredient_type.edit');
    Route::put('/ingredient_type/edit/{id}', [IngredientTypeController::class, 'update'])->name('ingredient_type.update');
    Route::get('/ingredient_type/delete', [IngredientTypeController::class, 'cancel'])->name('ingredient_type.cancel');
});
