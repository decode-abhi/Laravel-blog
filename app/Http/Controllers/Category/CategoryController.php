<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        return view('category.index',compact('category'));
    }
    public function create(){
        return view('category.create');
    }
    public function store(Request $request){
        $validator = $request->validate([
            'cat_name' => 'required|unique:categories,name',
            'image' => 'required|max:5000',
        ],
    [
        'cat_name.required' => 'name is required',
        'cat_name.unique' => 'name should be unique',
        'image.required' => 'name is required',
        'image.max' => 'image is more then size of 5MB',
    ]);

    if($validator){
        $file = $request->file('image');
        $filename = time().'.'.$file->extension();
        $path = $file->storeAs('uploads',$filename,'public');
        $catCre = new Category();
        $catCre->name = $request->cat_name;
        $catCre->image = $path;
        $catCre->save();
    }
        return redirect()->route('category.index')->with('success','Category created successfully');
    }
}
