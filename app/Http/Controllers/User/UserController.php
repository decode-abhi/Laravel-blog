<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
   public function index(){
    $users = User::all();
    return view('user.index',compact('users'));
   }
   public function create(){
    return view('user.create');
   }
   public function store(Request $request){
    $validator = $request->validate([
        'name' => 'required',
        'email' => 'required|unique:users,email',
        'role' => 'required',
        'password' => 'required',
        'profile_image' => 'required|max:5000',
    ]);
    if($validator){

        $file = $request->file('profile_image');
        $filename = time().'.'.$file->extension();
        $path = $file->storeAs('uploads',$filename,'public');

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = $request->password;
        $user->profileImage = $path;
        $user->save();  
    }
    return redirect()->route('user.index')->with('success','New user created');
   }
}
