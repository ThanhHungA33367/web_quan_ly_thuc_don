<?php

namespace App\Http\Controllers;

use App\Models\Menu_Dish;
use App\Http\Requests\StoreMenu_DishRequest;
use App\Http\Requests\UpdateMenu_DishRequest;

class MenuDishController extends Controller
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
     * @param  \App\Http\Requests\StoreMenu_DishRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMenu_DishRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu_Dish  $menu_Dish
     * @return \Illuminate\Http\Response
     */
    public function show(Menu_Dish $menu_Dish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu_Dish  $menu_Dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu_Dish $menu_Dish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMenu_DishRequest  $request
     * @param  \App\Models\Menu_Dish  $menu_Dish
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMenu_DishRequest $request, Menu_Dish $menu_Dish)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu_Dish  $menu_Dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu_Dish $menu_Dish)
    {
        //
    }
}
