<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Http\Requests\StoreIngredientRequest;
use App\Http\Requests\UpdateIngredientRequest;
use App\Models\Ingredient_Type;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $search = $request-> get('q');
        $data = Ingredient::where('ingredients.name','like','%'.$search.'%')
            ->join('ingredient_type','ingredient_type_id','=','ingredient_type.id')
            ->select('ingredient_type.name as ingredient_type_name','ingredients.*')
            ->paginate(2)->appends(['q' => $search]);
        return view('page.ingredient.ingredient',[
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
        $ingredient_type_data = Ingredient_Type::get();
        return view('page.ingredient.modal-add',[
            'ingredient_type_data' => $ingredient_type_data,

        ]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreIngredientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ingredient = new Ingredient();
        $ingredient->fill($request->all());
        $ingredient->save();
        return redirect()->route('ingredient.index')->with('message', 'Thêm thành công!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function show(Ingredient $ingredient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ingredient  $ingredient
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = Ingredient::where('id', '=', $id)->first();
        $ingredient_type_data = Ingredient_Type::get();

        return view('page.ingredient.modal-edit',[
            'object' => $object,
            'ingredient_type_data' => $ingredient_type_data,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIngredientRequest  $request
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ingredient = Ingredient::find($id);
        $ingredient->fill($request->except(['_token', '_method']));
        $ingredient->save();
        return redirect()->route('ingredient.index')->with('message', 'Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingredient $ingredient)
    {
        //
    }
    public function cancel(Request $request)
    {
        Ingredient::destroy($request->id);
    }
}
