<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function showTodoForm()
    {
        return view('todo');
    }

    public function todo(Request $request)
    {
       
    }
}
