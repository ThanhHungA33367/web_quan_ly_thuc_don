<?php

namespace App\Http\Controllers;

use App\Models\Ingredient_Type;
use App\Http\Requests\StoreIngredient_TypeRequest;
use App\Http\Requests\UpdateIngredient_TypeRequest;

class IngredientTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = $request-> get('q');
        $data = Meal::where('ingredient_type.name','like','%'.$search.'%')
            ->paginate(2)->appends(['q' => $search]);
        return view('page.ingredient_type',[
            'data' => $data,
            'search' => $search,
        ]);
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
     * @param  \App\Http\Requests\StoreIngredient_TypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIngredient_TypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ingredient_Type  $ingredient_Type
     * @return \Illuminate\Http\Response
     */
    public function show(Ingredient_Type $ingredient_Type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ingredient_Type  $ingredient_Type
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingredient_Type $ingredient_Type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIngredient_TypeRequest  $request
     * @param  \App\Models\Ingredient_Type  $ingredient_Type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIngredient_TypeRequest $request, Ingredient_Type $ingredient_Type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ingredient_Type  $ingredient_Type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingredient_Type $ingredient_Type)
    {
        //
    }
}
