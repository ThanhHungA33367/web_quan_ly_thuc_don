<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('page.welcomepage');
    }

    public function index1(Request $request)
    {
        $search = $request-> get('q');
        $data = User::where('users.email','like','%'.$search.'%')
            ->paginate(10)->appends(['q' => $search]);
        return view('page.user.user',[
            'data' => $data,
            'search' => $search,
        ]);
    }

    public function getUser(Request $request){
        $userId = Auth::id();
        $user = User::where('id', '=', $userId)->first();
        if($user->status == 0){
            $role = 'User';
        }
        else{
            $role = 'Admin';
        }
        return view('page.account',[
            'user' => $user,
            'role' => $role,
        ]);
    }

    public function updatePassword(Request $request)
    {
        $validatedData = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:5|confirmed',
        ], [
            'current_password.required' => 'Vui lòng nhập mật khẩu hiện tại',
            'new_password.required' => 'Vui lòng nhâp mật khẩu mới',
            'new_password.min' => 'Mật khẩu mới tối thiểu 5 kí tự',
            'new_password.confirmed' => 'Vui lòng xác nhận lại mật khẩu',
        ]);

        $user = Auth::user();

        if (!Hash::check($validatedData['current_password'], $user->password)) {
            return response()->json(['message' => 'Mật khẩu hiện tại không đúng'], 400);
        }

        $user->update(['password' => Hash::make($validatedData['new_password'])]);

        return response()->json(['message' => 'Thay đổi mật khẩu thành công'], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.user.modal-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->fill($request->all());
        $password = Hash::make($request->password);
        $user->password = $password;
        $user->status = 0;
        $user->save();
        return redirect()->route('user.index1')->with('message', 'Thêm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    public function editProfile($id)
    {
        $object = User::where('id', '=', $id)->first();
        
        return view('page.modal-change-profile',[
            'object' => $object,
        ]);
    }

    public function updateProfile(UpdateProfileRequest $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->validated());
        $user->save();
        return redirect()->route('account.index')->with('message', 'Sửa thành công!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = User::where('id', '=', $id)->first();
        return view('page.user.modal-edit',[
            'object' => $object,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->except(['_token', '_method']));
        $user->save();
        return redirect()->route('user.index1')->with('message', 'Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function cancel(Request $request)
    {
        User::destroy($request->id);
    }
    public function content1(Request $request)
    {
        return view('layout.view_content.content1');
    }
    public function content2(Request $request)
    {
        return view('layout.view_content.content2');
    }
    public function content3(Request $request)
    {
        return view('layout.view_content.content3');
    }



    
}
