@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">            
            <div class="card">
                <div class="card-header">
                    <span>ToDoカテゴリ一覧</span>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <button class="btn btn-primary btn-sm">ToDoカテゴリ 追加</button>
                        <span class="ml-2">|</span>
                        <a href="todo" class="btn btn-link btn-sm">ToDo一覧へ</a>
                    </div>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">カテゴリ名</th>
                            <th scope="col">編集</th>
                            <th scope="col">削除</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($todo_categories as $todo_category)
                                <tr>
                                    <td style="width:70%;">{{ $todo_category->name }}</td>
                                    <td style="width:15%;">
                                        <a href="#" class="btn btn-success btn-sm">編集</a>
                                    </td>
                                    <td style="width:15%;">
                                        <button class="btn btn-danger btn-sm">削除</button>
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
@endsection