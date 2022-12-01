<?php

namespace App\Http\Controllers;

use App\Models\Children_Type;
use App\Http\Requests\StoreChilden_TypeRequest;
use App\Http\Requests\UpdateChilden_TypeRequest;
use Illuminate\Http\Request;

class ChildrenTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request-> get('q');
        $data = Children_Type::where('children_type.name','like','%'.$search.'%')
            ->paginate(2)->appends(['q' => $search]);
        return view('page.children_type',[
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreChilden_TypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChilden_TypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Children_Type  $childen_Type
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Children_Type $childen_Type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Children_Type  $childen_Type
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Children_Type $childen_Type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChilden_TypeRequest  $request
     * @param  \App\Models\Children_Type  $childen_Type
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChilden_TypeRequest $request, Children_Type $childen_Type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Children_Type  $childen_Type
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Children_Type $childen_Type)
    {
        //
    }
}
