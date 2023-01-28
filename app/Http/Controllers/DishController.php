<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;
use App\Models\Dish_Ingredient;
use App\Models\Dish_Type;
use App\Models\Ingredient;
use App\Models\Ingredient_Type;
use App\Models\Children_Type;
use DishIngredient;
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
            ->join('children_type','children_type_id','=','children_type.id')
            ->select('dish_type.name as dishtypename','children_type.name as childrentypename','dishes.*')
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
        $children_type_data = Children_Type::get();
       return view('page.dish.modal-add',[
           'dish_type_data' => $dish_type_data,
           'children_type_data' => $children_type_data,
       ]);
    }
    public function create_ingredient_dish($id)
    {
        $object1 = Dish_Ingredient::query()->join('ingredients','ingredient_id','=','ingredients.id')
            ->select('ingredients.name as ingredients_name','dish_ingredient.*')
            ->where('dish_ingredient.dish_id','=',$id)
            ->get();

        $object = Dish::where('id', '=', $id)->first();
        $ingredient1 = Ingredient_Type::all();
        $ingredient = Ingredient::query()->join('ingredient_type','ingredient_type_id','=','ingredient_type.id')
            ->select('ingredient_type.name as ingredient_type_name','ingredients.*')
            ->get();
        return view('page.dish.modal-add-dish-ingredient',[
            'object' => $object,
            'ingredient' => $ingredient,
            'ingredient1' => $ingredient1,
            'object1' => $object1
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

    // public function update_ingredient_dish(Request $request, $id)
    //   {

    //     $dish_ingredient = Dish_Ingredient::find($id);
    //     $dish_id = $dish_ingredient->dish_id;
    //     $dish_ingredient->fill($request->except(['_token', '_method']));
    //     $dish_ingredient->save();
    //     return redirect()//->back()->with('message', 'Sửa thành công!');
    //     ->route('dish.create_ingredient_dish', $dish_id)->with('message', 'Sửa thành công!');

    //     $object1 = Dish_Ingredient::query()->join('ingredients','ingredient_id','=','ingredients.id')
    //         ->select('ingredients.name as ingredients_name','dish_ingredient.*')
    //         ->where('dish_ingredient.dish_id','=',$dish_ingredient->dish_id)
    //         ->get();

    //     $object = Dish::where('id', '=', $dish_ingredient->dish_id)->first();
    //     $ingredient1 = Ingredient_Type::all();
    //     $ingredient = Ingredient::query()->join('ingredient_type','ingredient_type_id','=','ingredient_type.id')
    //         ->select('ingredient_type.name as ingredient_type_name','ingredients.*')
    //         ->get();
    //     return view('page.dish.modal-add-dish-ingredient',[
    //         'object' => $object,
    //         'ingredient' => $ingredient,
    //         'ingredient1' => $ingredient1,
    //         'object1' => $object1
    //     ]);
    //}

    // public function edit_ingredient_dish($id){
    //     $object = Dish_Ingredient::where('id', '=', $id)->first();
    //     $ingredient = Ingredient::where('id', '=', $object->ingredient_id)->first();
    //     return view('page.dish.model-add-dish-ingredient-edit',[
    //         'object' => $object,
    //         'ingredient' => $ingredient,
    //     ]);
    // }

    public function store_ingredient_dish(Request $request)
    {
            $ingredient = $request->except(['_token']);

        $leads = [];
        $lead = [];
        $quantity = [];
        $ingredients = [];

            $leads = $ingredient['dish_id'];
            $lead = $ingredient['id_dish'];
            $quantity = $ingredient['quantity'];
            $ingredients = $ingredient['ingredient_id'];

            $scores = new Dish_Ingredient();
        foreach($leads as $key => $input) {

            $scores->dish_id = isset($lead[$key]) ? $lead[$key] : '';
            $scores->ingredient_id = isset($ingredients[$key]) ? $ingredients[$key] : ''; //add a default value here
            $scores->quantity = isset($quantity [$key]) ? $quantity [$key] : ''; //add a default value here
            $scores->save();
        }

        $ingredient_cal = Ingredient::where('id', '=', $scores->ingredient_id)->first();

        $kalo = $ingredient_cal->kalo_day/100*$scores->quantity;
        $protein = $ingredient_cal->protein/100*$scores->quantity;
        $lipid = $ingredient_cal->lipid/100*$scores->quantity;
        $carb = $ingredient_cal->carb/100*$scores->quantity;
        $cost = $ingredient_cal->cost/100*$scores->quantity;


        $dish = Dish::where('id', '=', $scores->dish_id)->first();
        $dish['kalo'] = $kalo + $dish->kalo;
        $dish['protein'] = $protein + $dish->protein;
        $dish['lipid']= $lipid + $dish->lipid;
        $dish['carb'] = $carb + $dish->carb;
        $dish['cost'] = $cost + $dish->cost;

        // $dish_nutri = new Dish();
        // $dish_nutri['kalo'] = $kalo_dish;
        // $dish_nutri['protein'] = $protein_dish;
        // $dish_nutri['lipid'] = $lipid_dish;
        // $dish_nutri['carb'] = $carb_dish;
        // $dish_nutri['cost'] = $cost_dish;

        $dish->save();

//        $ingredient = new Dish_Ingredient();
//        $ingredient->fill($request->all());
//        $ingredient->save();
        return $this->show($ingredient['id_dish']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $object = Dish_Ingredient::query()->join('ingredients','ingredient_id','=','ingredients.id')
        ->select('ingredients.name as ingredients_name','dish_ingredient.*')
            ->where('dish_ingredient.dish_id','=',$id)
        ->get();
        return view('page.dish.showIngredient', [
            'object' => $object,
        ]);
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
        $children_type_data = Children_Type::get();
        return view('page.dish.modal-edit',[
            'object' => $object,
            'dish_type_data' => $dish_type_data,
           'children_type_data' => $children_type_data,
        ]);
    }

    public function select($id){
        $object = Dish::where('id', '=', $id)->first();
        $dish_type_data = Dish_Type::where('id', '=', $object->dish_type_id)->first();
        $children_type_data = Children_Type::where('id', '=', $object->children_type_id)->first();
        return view('page.dish.modal-select',[
            'object' => $object,
            'dish_type_data' => $dish_type_data,
            'children_type_data' => $children_type_data,
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
    public function getIngredient($ingredient_type_id)
    {
       $ingredient = Ingredient::where('ingredient_type_id','=',$ingredient_type_id)->get();
       return view('page.dish.selectIngredient',
       [
           'ingredient' => $ingredient,
       ]);
    }
    public function deleteIngredient(Request $request): void
    {

        $dish_ingredient = Dish_Ingredient::where('id', '=', $request->id)->first();
        $ingredient_cal = Ingredient::where('id', '=', $dish_ingredient->ingredient_id)->first();

        $protein = $ingredient_cal->protein/100*$dish_ingredient->quantity;
        $kalo = $ingredient_cal->kalo_day/100*$dish_ingredient->quantity;
        $lipid = $ingredient_cal->lipid/100*$dish_ingredient->quantity;
        $carb = $ingredient_cal->carb/100*$dish_ingredient->quantity;
        $cost = $ingredient_cal->cost/100*$dish_ingredient->quantity;


        $dish = Dish::where('id', '=', $dish_ingredient->dish_id)->first();
        $dish['kalo'] = $dish->kalo - $kalo ;
        $dish['protein'] = $dish->protein - $protein;
        $dish['lipid']= $dish->lipid - $lipid ;
        $dish['carb'] = $dish->carb - $carb  ;
        $dish['cost'] =  $dish->cost - $cost ;


        $dish->save();

        Dish_Ingredient::destroy($request->id);









    }

}
