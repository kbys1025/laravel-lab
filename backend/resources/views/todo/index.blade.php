@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-3">
            <a href="todo-category" class="btn btn-secondary btn-block">カテゴリ一覧へ</a>
        </div>
        
        <div class="col-md-12">            
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <span>絞り込み</span>
                        </div>
                        <div class="card-body">
                            <form action="/todo" method="GET" id="todoSearch">
                                <div class="form-group">
                                    <label for="categorySelect">カテゴリ</label>
                                    <select class="form-control todo-search" id="categorySelect" name="todo_category_id">
                                        <option value="all">すべて</option>
                                        @foreach ($todo_categories as $todo_category) 
                                            <option value="{{ $todo_category->id }}" @if($todo_category->id == $selected_category_id) selected @endif>
                                                {{ $todo_category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="statusSelect">状態</label>
                                    <select class="form-control todo-search" id="statusSelect" name="status">
                                        <option value="all">すべて</option>
                                        @foreach ($status_list as $key => $val) 
                                            <option value="{{ $key }}" @if($key == $selected_status) selected @endif>
                                                {{ $val }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <span>ToDo一覧</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-2">
                                <a href="todo/create" class="btn btn-primary btn-sm">ToDo 追加</a>
                            </div>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">タイトル</th>
                                    <th scope="col">カテゴリ</th>
                                    <th scope="col">状態</th>
                                    <th scope="col">期限</th>
                                    <th scope="col">編集</th>
                                    <th scope="col">削除</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($todos as $todo)
                                        <tr>
                                            <td><a href="todo/{{ $todo->id }}">{{ $todo->title }}</a></td>
                                            <td>{{ $todo->todo_category->name }}</td>
                                            <td>@if($todo->status == config('const.todos.STATUS_IN_PROGRESS')) 着手中 @elseif($todo->status == config('const.todos.STATUS_COMPLETED')) 完了 @else 未着手 @endif</td>
                                            <td>@if(isset($todo->deadline)) {{ $todo->deadline->format('Y/m/d') }} @else 未設定 @endif</td>
                                            <td>
                                                <a href="todo/{{ $todo->id }}/edit" class="btn btn-success btn-sm">編集</a>
                                            </td>
                                            <td style="width:10%;">
                                                <button type="button" class="btn btn-danger btn-sm" 
                                                    data-toggle="modal" 
                                                    data-target="#deleteModal" 
                                                    data-id="{{ $todo->id }}"
                                                    data-controller="todo"
                                                >削除</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@component('modal.delete')
@endcomponent

@endsection

@section('js')
<script src="{{ mix('js/delete_modal.js') }}" defer></script>
<script src="{{ mix('js/todo.js') }}" defer></script>
@endsection