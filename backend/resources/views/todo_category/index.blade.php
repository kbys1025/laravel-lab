@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-3">
            <a href="todo" class="btn btn-secondary btn-block">ToDo一覧へ</a>
        </div>

        <div class="col-md-12">            
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <span>ToDoカテゴリ追加</span>
                        </div>
                        <div class="card-body">
                            <form id="todoCategoryForm" action="todo-category" method="POST">
                                @csrf
                                <div class="form-group">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="float-right">
                                    <button type="button" class="btn btn-light border" style="width:100px;">キャンセル</button>
                                    <button type="submit"class="btn btn-primary ml-2" style="width:100px;">追加</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <span>ToDoカテゴリ一覧</span>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">カテゴリ名</th>
                                    <th scope="col">削除</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($todo_categories as $todo_category)
                                        <tr>
                                            <td style="width:90%;">{{ $todo_category->name }}</td>
                                            <td style="width:10%;">
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
    </div>
</div>
@endsection

@section('js')
<script src="{{ mix('js/todo_category.js') }}" defer></script>
@endsection