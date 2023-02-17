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
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;


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
    public function list(Request $request){
        $userId = Auth::id();
        $user = User::where('id', '=', $userId)->first();
        $search = $request-> get('q');

        if($user->status == 0){
            $data = Menu::where('menus.name','like','%'.$search.'%')->where('users.id', '=', $userId)
            ->join('users', 'user_id', '=', 'users.id')
            ->join('children_type','children_type_id','=','children_type.id')
            ->select('children_type.name as children_type_name','menus.*')
            ->paginate(10)->appends(['q' => $search]);
        }
        else{
            $data = Menu::where('menus.name','like','%'.$search.'%')
            ->join('children_type','children_type_id','=','children_type.id')
            ->select('children_type.name as children_type_name','menus.*')
            ->paginate(10)->appends(['q' => $search]);
        }  

        return view('page.menu.list-menu',[
            'data' => $data,
            'search' => $search,
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
    public function store(StoreMenuRequest $request)
    {
        $data = $request->except(['_token']);
        $menu = new Menu();
        $menu['name'] = $request->name;
        $menu['description'] = $request->description;
        $menu['children_type_id'] = $request->children_type_id;
        $menu['menu_date'] = $request->menu_date;
        $menu['user_id'] = Auth::id();
        $menu->kalo = 0;
        $menu->protein = 0;
        $menu->lipid = 0;
        $menu->carb = 0;
        $menu->cost = 0;
        $validator = Validator::make($request->all(), $request->rules());
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        //$menu->validate();
        $menu->save();
        $menu_id = [];
        $menu_id = $menu->id;
        $mealdish = json_decode($request->mealdish, true);

        for ($i = 0; $i < count($mealdish); $i++) {
            $scores = new Menu_Dish();
            $scores->dish_id = $mealdish[$i]['dish_id'];
            $dish = Dish::where('id', '=', $scores->dish_id)->first();
            $menu->kalo += $dish->kalo;
            $menu->protein += $dish->protein;
            $menu->lipid += $dish->lipid;
            $menu->carb += $dish->carb;
            $menu->cost += $dish->cost;
            $scores->menu_id = $menu_id;
            $scores->meal_id = $mealdish[$i]['meal_id']; //add a default value here
            // $validator = Validator::make($mealdish[$i],[
            //     'dish_id' => [
            //         Rule::unique('menu_dish')->where(fn ($query) => $query->where('meal_id', $mealdish[$i]['meal_id'])
            //                                                                 ->where('dish_id', $mealdish[$i]['dish_id'])),
            //      ]
            // ] );
            // if ($validator->fails()) {
            //     return response()->json(['errors' => 'errors']);
            // }
            
            $scores->save();
        }
        $menu->save();
        return response()->json(['success' => 'success'], 200);
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
