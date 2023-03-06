<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Http\Requests\StoreMealRequest;
use App\Http\Requests\UpdateMealRequest;
use Illuminate\Http\Request;


class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request )
    {
        $search = $request-> get('q');
        $data = Meal::where('meals.name','like','%'.$search.'%')
            ->paginate(10)->appends(['q' => $search]);
        return view('page.meal.meal',[
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
        return view('page.meal.modal-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMealRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMealRequest $request)
    {
        $meal = new Meal();
        $meal->fill($request->validated());
        $meal->save();
        return redirect()->route('meal.index')->with('message', 'Thêm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function show(Meal $meal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = Meal::where('id', '=', $id)->first();
        return view('page.meal.modal-edit',[
            'object' => $object,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMealRequest  $request
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMealRequest $request, $id)
    {
        $meal = Meal::find($id);
        $meal->fill($request->validated());
        $meal->save();
        return redirect()->route('meal.index')->with('message', 'Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meal $meal)
    {
        
    }
    public function cancel(Request $request)
    {
        Meal::destroy($request->id);
    }
}
