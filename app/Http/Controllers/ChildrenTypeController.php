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
        return view('page.children-type.children_type',[
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
        return view('page.children-type.modal-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreChilden_TypeRequest  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $children_type = new Children_Type();
        $children_type->fill($request->all());
        $children_type->save();
        return redirect()->route('children_type.index')->with('message', 'Thêm thành công!');
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = Children_Type::where('id', '=', $id)->first();
        return view('page.children-type.modal-edit',[
            'object' => $object,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChilden_TypeRequest  $request
     * @param  \App\Models\Children_Type  $childen_Type
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $children_type = Children_Type::find($id);
        $children_type->fill($request->except(['_token', '_method']));
        $children_type->save();
        return redirect()->route('children_type.index')->with('message', 'Sửa thành công!');
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

    }
    public function cancel(Request $request)
    {
        Children_Type::destroy($request->id);
    }
}
