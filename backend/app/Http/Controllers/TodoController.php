<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $login_user = Auth::user();
        $todos = $login_user->todos;
        return view('todo.index', ['todos' => $todos]);
    }

    public function create()
    {
        $todo_categories = Auth::user()->todo_categories;
        return view('todo.create', ['todo_categories' => $todo_categories]);
    }
}
