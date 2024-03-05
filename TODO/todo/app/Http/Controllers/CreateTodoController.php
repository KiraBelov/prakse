<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateTodoController extends Controller
{
    public function showCreateTodoForm()
    {
        return view('createTodo');
    }

    public function createTodo(Request $request)
    {
        
        
    }
}