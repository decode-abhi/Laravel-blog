<?php

namespace App\Http\Controllers\todo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(){
        $task = [
            ['Title'=>'Learn Route','Status'=>1],
            ['Title'=>'Learn Model','Status'=>0],
            ['Title'=>'Learn Controller','Status'=>0],
        ];
        return view('todo.index',compact('task'));
    }
}
