<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use ChildrenType;
use App\Models\Children_Type;
use App\Models\Dish;
use App\Models\Dish_Type;
use App\Models\Meal;
use App\Models\Menu_Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $children_type = Children_Type::all();

        $dish = Dish::all();
        return view('page.menu.create-menu', [
            'children_type' => $children_type,

            'dish' => $dish,

        ]);
    }
    public function getDish($dish_type_id)
    {
        // $dish = Dish::where('dish_type_id', '=', $dish_type_id)->get();
        // return view(
        //     'page.menu.selectDish',
        //     [

        //     ]
        // );
    }
    public function getChildren($children_type_id)
    {
        $dish1 = Dish::where('children_type_id', '=', $children_type_id)->get();
        $meals = Meal::all();
        return view('page.menu.selectDish', [
            'meals' => $meals,
            'dish1' => $dish1,


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
     * @param  \App\Http\Requests\StoreMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except(['_token']);
        $menu = new Menu();
        $menu['name'] = $request->name;
        $menu['description'] = $request->description;
        $menu['children_type_id'] = $request->children_type_id;
        $menu['menu_date'] = $request->menu_date;
        $menu['user_id'] = Auth::id();
        $menu->save();
        $menu_id = [];
        $menu_id = $menu->id;
        $mealdish = json_decode($request->mealdish, true);




        for ($i = 0; $i < count($mealdish); $i++) {
            $scores = new Menu_Dish();
            $scores->dish_id = $mealdish[$i]['dish_id'];
            $scores->menu_id = $menu_id;
            $scores->meal_id = $mealdish[$i]['meal_id']; //add a default value here
            $scores->save();
        }
        $kalo = [];
        $protein = [];
        $lipid = [];
        $carb = [];
        $cost = [];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMenuRequest  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
