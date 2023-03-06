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
use App\Http\Requests\UniqueDishMealPairRule;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\MenuExport;


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
    public function list(Request $request)
    {
        $userId = Auth::id();
        $user = User::where('id', '=', $userId)->first();
        $search = $request-> get('q');
        $startDate = $request->get('startDate');
        $endDate = $request->get('endDate');
        if ($user->status == 0) {
            $query = Menu::where('users.id', '=', $userId);
        } else {
            $query = Menu::query();
        }
    
        if ($search) {
            $query->where('menus.name', 'like', '%' . $search . '%');
        }
    
        if ($startDate && $endDate) {
            $query->whereBetween('menu_date', [$startDate, $endDate]);
        }
    
        $data = $query->join('users', 'user_id', '=', 'users.id')
            ->join('children_type', 'children_type_id', '=', 'children_type.id')
            ->select('children_type.name as children_type_name', 'menus.*')
            ->paginate(10)
            ->appends([
                'q' => $search,
                'startDate' => $startDate,
                'endDate' => $endDate,
            ]);
    
        return view('page.menu.list-menu', [
            'data' => $data,
            'search' => $search,
            'startDate' => $startDate,
            'endDate' => $endDate,
        ]);
    }

    public function export(Request $request)
    {
        $userId = Auth::id();
        $user = User::where('id', '=', $userId)->first();
        $search = $request->get('q');
        $startDate = $request->get('startDate');
        $endDate = $request->get('endDate');

        if ($user->status == 0) {
            $query = Menu::where('users.id', '=', $userId);
        } else {
            $query = Menu::query();
        }

        if ($search) {
            $query->where('menus.name', 'like', '%' . $search . '%');
        }

        if ($startDate && $endDate) {
            $query->whereBetween('menu_date', [$startDate, $endDate]);
        }

        $data = $query->join('users', 'user_id', '=', 'users.id')
            ->join('children_type', 'children_type_id', '=', 'children_type.id')
            ->select('users.full_name as user_name','children_type.name as children_type_name', 'menus.*')
            ->get();

        return Excel::download(new MenuExport($data), 'menus.xlsx');
    }

    public function view_detail($id)
    {
        $data = Menu_Dish::where('menu_id', '=', $id)->first();
        if ($data != null) {
            $dish_id = $data->dish_id;
            $data_menu = Menu::where('id', '=', $id)->get();
            $data_dish = Dish::where('id', '=', $dish_id)->get();
            $data_dish1 = Dish::where('id', '=', $dish_id)->first();
            $children_type_id = $data_dish1->children_type_id;
            $data_children_type = Children_Type::where('id', '=', $children_type_id)->get();
            return view('page.menu.modal-view-detail', [
                'data_dish' => $data_dish,
                'data_menu' => $data_menu,
                'data_children_type' => $data_children_type,
            ]);
        } else {
            Redirect::back()->withErrors(['msg' => 'The Message']);
        }
    }

    public function getDish($dish_type_id)
    {
        $dish = Dish::where('dish_type_id', '=', $dish_type_id)->get();
        return view(
            'page.menu.selectDish',
            []
        );
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
      
        $menu->save();
        $menu_id = [];
        $menu_id = $menu->id;
        $mealdish = json_decode($request->mealdish, true);
        $validator = Validator::make($request->all(), $request->rules());
            if ($validator->fails()) {
                return response()->json(['errors' => 'errors']);
            }
        for ($i = 0; $i < count($mealdish); $i++) {
            $scores = new Menu_Dish();
            $scores->dish_id = $mealdish[$i]['dish_id'];
            $dish = Dish::where('id', '=', $scores->dish_id)->first();
            if ($dish) {
                $menu->kalo += $dish->kalo;
                $menu->protein += $dish->protein;
                $menu->lipid += $dish->lipid;
                $menu->carb += $dish->carb;
                $menu->cost += $dish->cost;
                $scores->menu_id = $menu_id;
                $scores->meal_id = $mealdish[$i]['meal_id']; //add a default value here  
                $scores->save();
            }
            
        }
        $menu->save();

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
