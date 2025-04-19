<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginForm(){
       
        return view('admin.login');
    }
    public function store(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        if(Auth::attempt($credentials)){

            if(Auth::user()->role == 'Admin' || Auth::user()->role == 1){
                $request->session()->regenerate();
                return redirect()->route('admin.dashboard');
            }
            Auth::logout();
            return redirect('/')->with('message','you are not an admin');
        }
        return back()->withErrors(['email' => 'Invalid Credentials']);
    }
}
