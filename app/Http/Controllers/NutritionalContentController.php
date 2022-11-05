<?php

namespace App\Http\Controllers;

use App\Models\Nutritional_Content;
use App\Http\Requests\StoreNutritional_ContentRequest;
use App\Http\Requests\UpdateNutritional_ContentRequest;

class NutritionalContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreNutritional_ContentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNutritional_ContentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nutritional_Content  $nutritional_Content
     * @return \Illuminate\Http\Response
     */
    public function show(Nutritional_Content $nutritional_Content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nutritional_Content  $nutritional_Content
     * @return \Illuminate\Http\Response
     */
    public function edit(Nutritional_Content $nutritional_Content)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNutritional_ContentRequest  $request
     * @param  \App\Models\Nutritional_Content  $nutritional_Content
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNutritional_ContentRequest $request, Nutritional_Content $nutritional_Content)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nutritional_Content  $nutritional_Content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nutritional_Content $nutritional_Content)
    {
        //
    }
}
