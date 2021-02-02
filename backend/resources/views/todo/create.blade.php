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
                                    <option value="{{ $todo_category->id }}" @if (old('todo_category_id') == $todo_category->id) selected @endif>{{ $todo_category->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('todo_category_id'))
                                <span class="text-danger">{{ $errors->first('todo_category_id') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="todoTitle">タイトル</label>
                            <input type="text" id="todoTitle" class="form-control" name="title" value="{{ old('title') }}">
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="todoDeadline">期限</label>
                            <input type="date" id="todoDeadline" class="form-control" name="deadline" value="{{ old('deadline') }}">
                            @if ($errors->has('deadline'))
                                <span class="text-danger">{{ $errors->first('deadline') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="todoText">メモ</label>
                            @if ($errors->has('text'))
                                <span class="text-danger">{{ $errors->first('text') }}</span>
                            @endif
                            <textarea class="form-control" id="todoText" name="text" rows="5">{{ old('text') }}</textarea>
                            
                        </div>
                        <button type="submit" class="btn btn-primary" style="width:100px;">登録</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection