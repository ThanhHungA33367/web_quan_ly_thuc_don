<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Dish_Type;
use App\Http\Requests\StoreDish_TypeRequest;
use App\Http\Requests\UpdateDish_TypeRequest;
use DishType;
use Illuminate\Http\Request;

class DishTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request-> get('q');
        $data = Dish_Type::where('dish_type.name','like','%'.$search.'%')
            ->paginate(2)->appends(['q' => $search]);
        return view('page.dish-type.dish_type',[
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
        return view('page.dish-type.modal-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDish_TypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDish_TypeRequest $request)
    {
        $dish_type = new Dish_Type();
        $dish_type->fill($request->all());
        $dish_type->save();
        return redirect()->route('dish_type.index')->with('message', 'Thêm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dish_Type  $dish_Type
     * @return \Illuminate\Http\Response
     */
    public function show(Dish_Type $dish_Type)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dish_Type  $dish_Type
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish_Type $dish_Type)
    {
        $object = Dish_Type::where('id', '=', $id)->first();
        return view('page.dish-type.modal-edit',[
            'object' => $object,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDish_TypeRequest  $request
     * @param  \App\Models\Dish_Type  $dish_Type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDish_TypeRequest $request, Dish_Type $dish_Type)
    {
        $dish_Type = Dish_Type::find($id);
        $dish_Type->fill($request->except(['_token', '_method']));
        $dish_Type->save();
        return redirect()->route('dish_type.index')->with('message', 'Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dish_Type  $dish_Type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish_Type $dish_Type)
    {
        //
    }
    public function cancel(Request $request)
    {
        Dish_Type::destroy($request->id);
    }
}
