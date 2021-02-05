<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TodoRequest;
use App\Todo;

class TodoController extends Controller
{
    public function index(Request $request)
    {
        $login_user = Auth::user();
        $todo_categories = $login_user->todo_categories;
        $status_list = $this->make_status_list();
        $status_list[config('const.todos.STATUS_NOT_COMPLETED')] = '未完了';
        $selected_category_id = $request->input('todo_category_id');
        $selected_status = $request->input('status');
        $query = [];

        if (!empty($selected_category_id) && $selected_category_id !== 'all') {
            $selected_category_id = intval($selected_category_id);
            $query[] = array('todo_category_id', '=', $request->input('todo_category_id'));
        }

        if (!empty($selected_status) && $selected_status !== 'all') {
            $selected_status = intval($selected_status);
            if ($selected_status === 4) {
                $query[] = array('status', '<>', 3);
            } else {
                $query[] = array('status', '=', $request->input('status'));
            }
        }

        if (!empty($query)) {
            $todos = $login_user->todos()->where($query)->get();
        }else {
            $todos = $login_user->todos;
        }

        return view('todo.index', [
            'todos' => $todos, 'todo_categories' => $todo_categories, 'status_list' => $status_list, 
            'selected_category_id' => $selected_category_id, 'selected_status' => $selected_status,
        ]);
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
        $status_list = $this->make_status_list();

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

    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();

        return redirect('todo');
    }

        public function make_status_list()
        {
            $status_list = array(
                config('const.todos.STATUS_NOT_STARTED') => '未着手',
                config('const.todos.STATUS_IN_PROGRESS') => '着手中',
                config('const.todos.STATUS_COMPLETED') => '完了',
            );

            return $status_list;
        }
}
