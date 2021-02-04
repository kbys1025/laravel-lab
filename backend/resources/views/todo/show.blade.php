@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="mb-2">
                <a href="/todo">ToDo一覧へ</a>
            </div>      
            <div class="card">
                <div class="card-header">
                    <span>ToDo詳細</span>
                </div>
                <div class="card-body">
                    <div class="text-right">
                        <a href="/todo/{{ $todo->id }}/edit" class="btn btn-success" style="width:100px;">編集</a>
                        <button href="#" class="btn btn-danger ml-2" style="width:100px;">削除</button>
                    </div>
                    <div class="border-bottom mb-3">
                        <label for="todoTitle">タイトル</label>
                        <p id="todoTitle" class="ml-3">{{ $todo->title }}</p>
                    </div>
                    <div class="border-bottom mb-3">
                        <label for="todoCategory">カテゴリ</label>
                        <p id="todoCategory" class="ml-3">{{ $todo->todo_category->name }}</p>
                    </div>
                    <div class="border-bottom mb-3">
                        <label for="todoStatus">状態</label>
                        <p id="todoStatus" class="ml-3">@if($todo->status == config('const.todos.STATUS_IN_PROGRESS')) 着手中 @elseif($todo->status == config('const.todos.STATUS_COMPLETED')) 完了 @else 未着手 @endif</p>
                    </div>
                    <div class="border-bottom mb-3">
                        <label for="todoDeadline">期限</label>
                        <p id="todoDeadline" class="ml-3">@if(isset($todo->deadline)) {{ $todo->deadline->format('Y/m/d') }} @else 未設定 @endif</p>
                    </div>
                    <div>
                        <label for="todoText">メモ</label>
                        <p id="todoText" class="ml-3">{!! nl2br(e($todo->text)) !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection