<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    function index(){
        return view('login.index');
    }

    function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $inputLogin = $request->only('email', 'password');
        $user = User::where('email', $inputLogin['email'])->first();
        if($user && Hash::check($inputLogin['password'], $user->password)){
            Auth::login($user);
            return redirect('/home');
        }
        return back()->withErrors(['email' => 'email/password tidak sesuai']);
    }

    function register(Request $request){
        $request->validate([
            'name' => 'required|min:6',
            'email' => 'required|email|unique:users',
            'gender' => 'required',
            'password' => 'required'
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'password' => Hash::make($request->password),
            'role' => 'member'
        ]);
        return redirect()->route('login')->with('Succses');
    }

    function logout(){
        Auth::logout();
        return redirect('/login');
    }

    function inreg(){
        return view('register.index');
    }
}
