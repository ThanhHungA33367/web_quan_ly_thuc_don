<?php

namespace App\Http\Controllers;

use App\Models\Ingredient_Type;
use App\Http\Requests\StoreIngredient_TypeRequest;
use App\Http\Requests\UpdateIngredient_TypeRequest;
use Illuminate\Http\Request;

class IngredientTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request-> get('q');
        $data = Ingredient_Type::where('ingredient_type.name','like','%'.$search.'%')
            ->paginate(10)->appends(['q' => $search]);
        return view('page.ingredient-type.ingredient_type',[
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
        return view('page.ingredient-type.modal-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreIngredient_TypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ingredient_type = new Ingredient_Type();
        $ingredient_type->fill($request->all());
        $ingredient_type->save();
        return redirect()->route('ingredient_type.index')->with('message', 'Thêm thành công!');
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
    public function edit($id)
    {
        $object = Ingredient_Type::where('id', '=', $id)->first();
        return view('page.ingredient-type.modal-edit',[
            'object' => $object,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIngredient_TypeRequest  $request
     * @param  \App\Models\Ingredient_Type  $ingredient_Type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ingredient_type = Ingredient_Type::find($id);
        $ingredient_type->fill($request->except(['_token', '_method']));
        $ingredient_type->save();
        return redirect()->route('ingredient_type.index')->with('message', 'Sửa thành công!');
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
    public function cancel(Request $request)
    {
        Ingredient_Type::destroy($request->id);
    }
}
