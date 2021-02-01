<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TodoCategory;
use App\Http\Requests\TodoCategoryRequest;
use Illuminate\Support\Facades\Auth;

class TodoCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $login_user = Auth::user();
        $todo_categories = $login_user->todo_categories;
        return view('todo_category.index', ['todo_categories' => $todo_categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoCategoryRequest $request)
    {
        $todo_category = new TodoCategory;
        $todo_category->user_id = Auth::id();
        $todo_category->name = $request->name;
        $todo_category->save();

        return redirect('todo-category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo_category = TodoCategory::find($id);
        $todo_category->delete();

        return redirect('todo-category');
    }
}
