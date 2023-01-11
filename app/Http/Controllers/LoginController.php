<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        if (Auth::check()) {
            return redirect()->route('user.index');
        }

        return view('login');

    }
    public function postLogin(LoginRequest $request): \Illuminate\Http\RedirectResponse
    {
        $login = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        if (Auth::attempt($login)) {
            return redirect()->route('user.index');
        }
        else{
            return redirect()->back()->with('Email hoặc Password không chính xác');
        }

    }
    public function Logout(Request $request){
        Auth::logout();
        return redirect()->route('login.index');
    }




}
