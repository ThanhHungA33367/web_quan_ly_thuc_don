<?php

namespace App\Http\Controllers;

use App\Models\Dish_Ingredient;
use App\Http\Requests\StoreDish_IngredientRequest;
use App\Http\Requests\UpdateDish_IngredientRequest;

class DishIngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDish_IngredientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDish_IngredientRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dish_Ingredient  $dish_Ingredient
     * @return \Illuminate\Http\Response
     */
    public function show(Dish_Ingredient $dish_Ingredient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dish_Ingredient  $dish_Ingredient
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish_Ingredient $dish_Ingredient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDish_IngredientRequest  $request
     * @param  \App\Models\Dish_Ingredient  $dish_Ingredient
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDish_IngredientRequest $request, Dish_Ingredient $dish_Ingredient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dish_Ingredient  $dish_Ingredient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish_Ingredient $dish_Ingredient)
    {
        //
    }
}
