<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FileHandlingController extends Controller
{
    public function store(Request $request){
        $file = $request->file('file_hand');
    
        $fileName = time() . ".".$file->extension();
        $path = $file->store('uploads','public');
        dd($path);
        return view('fileHandling',compact('path'));
    }
}
