<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        $post = Post::paginate(10);
        return view('post.index',compact('post'));
    }

    public function create(){
        
        return view('post.create');
    }

    public function store(Request $request){
        $validator = $request->validate([
            'title' => 'required|unique:posts',
            'body' => 'required',
        ],
        [
            'title.required' => 'title is required',
            'title.unique' => 'title is taken',
            'body.required' => 'content is required'
        ]);
        Post::create($validator);
        // if ($validator->passes()) {
        //     $post = new Post();
        //     $post->title = $request->title;
        //     $post->body = $request->body;
        //     $post->save();

            return redirect()->route('post.index')->with('success', 'Post created successfully!');
        // }
    }
    public function edit($id){
        $post = Post::findOrFail($id);
       return view('post.edit',compact('post'));
    }
    public function update(Request $request,$id){
        
        $validator = $request->validate([
            'title' => 'required|unique:posts,title,'.$id,
            'body' => 'required',
        ],
        [
            'title.required' => 'title is required',
            'title.unique' => 'title should be unique',
            'body.required' => 'content is required',
        ]);

        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return redirect()->route('post.index')->with('success', 'Post updated successfully!');

    }
    public function destroy($id){
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('post.index')->with('success','post is deleted succeessfully!');
    }
}
