<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TodoRequest;
use App\Todo;

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
        $action = 'create';
        $todo = new Todo;
        $todo_categories = Auth::user()->todo_categories;

        return view('todo.form', ['todo_categories' => $todo_categories, 'action' => $action, 'todo' => $todo]);
    }

    public function store(TodoRequest $request)
    {
        $todo = new Todo;
        $todo->user_id = Auth::id();
        $todo->todo_category_id = $request->todo_category_id;
        $todo->title = $request->title;
        $todo->deadline = $request->deadline;
        $todo->text = $request->text;
        $todo->save();

        return redirect('todo');
    }

    public function show($id)
    {
        $todo = Todo::find($id);
        return view('todo.show', ['todo' => $todo]);
    }

    public function edit($id)
    {
        $action = 'edit';
        $todo = Todo::find($id);
        $todo_categories = Auth::user()->todo_categories;

        $status_list = array(
            config('const.todos.STATUS_NOT_STARTED') => '未着手',
            config('const.todos.STATUS_IN_PROGRESS') => '着手中',
            config('const.todos.STATUS_COMPLETED') => '完了',
        );

        return view('todo.form', ['todo_categories' => $todo_categories, 'action' => $action, 'todo' => $todo, 'status_list' => $status_list]);
    }

    public function update(TodoRequest $request, $id)
    {
        $todo = Todo::find($id);
        $todo->todo_category_id = $request->todo_category_id;
        $todo->title = $request->title;
        $todo->status = $request->status;
        $todo->deadline = $request->deadline;
        $todo->text = $request->text;
        $todo->save();

        return redirect('todo/'.$todo->id);
    }
}
