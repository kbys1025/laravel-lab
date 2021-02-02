@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">            
            <div class="card">
                <div class="card-header">
                    <span>ToDo一覧</span>
                </div>
                <div class="card-body">
                    <form action="/todo" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="todoCategory">カテゴリ</label>
                            <select id="todoCategory" class="form-control" name="todo_category_id">
                                <option value="">選択してください。</option>
                                @foreach ($todo_categories as $todo_category)
                                    <option value="{{ $todo_category->id }}">{{ $todo_category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="todoTitle">タイトル</label>
                            <input type="text" id="todoTitle" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label for="todoDeadline">期限</label>
                            <input type="date" id="todoDeadline" class="form-control" name="deadline">
                        </div>
                        <div class="form-group">
                            <label for="todoText">メモ</label>
                            <textarea class="form-control" id="todoText" name="text" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" style="width:100px;">登録</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection