<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;
use App\Models\Dish_Type;
use App\Models\Meal;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request-> get('q');

        $data = Dish::where('dishes.name','like','%'.$search.'%')
            ->join('dish_type','dish_type_id','=','dish_type.id')
            ->join('meals','meal_id','=','meals.id')
            ->select('dish_type.name as dishtypename','meals.name as mealsname','dishes.*')
            ->paginate(10)->appends(['q' => $search]);
        return view('page.dish.dish',[
            'data' => $data,
            'search' => $search,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $dish_type_data = Dish_Type::get();
        $meal_data = Meal::get();
       return view('page.dish.modal-add',[
           'dish_type_data' => $dish_type_data,
           'meal_data' => $meal_data,
       ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDishRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dish = new Dish();
        $dish->fill($request->all());
        $dish->save();
        return redirect()->route('dish.index')->with('message', 'Thêm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = Dish::where('id', '=', $id)->first();
        $dish_type_data = Dish_Type::get();
        $meal_data = Meal::get();
        return view('page.dish.modal-edit',[
            'object' => $object,
            'dish_type_data' => $dish_type_data,
           'meal_data' => $meal_data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDishRequest  $request
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dish = Dish::find($id);
        $dish->fill($request->except(['_token', '_method']));
        $dish->save();
        return redirect()->route('dish.index')->with('message', 'Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        //
    }
    public function cancel(Request $request)
    {
        Dish_Type::destroy($request->id);
    }
}
