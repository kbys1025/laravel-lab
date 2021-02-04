@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">            
            <div class="card">
                <div class="card-header">
                    <span>@if ($action == 'edit') ToDo編集 @else ToDo追加 @endif</span>
                </div>
                <div class="card-body">
                    @if ($action == 'edit')
                        <form action="/todo/{{ $todo->id }}" method="POST">
                            @method('PUT')
                    @else
                        <form action="/todo" method="POST">
                    @endif
                        @csrf
                        <div class="form-group">
                            <label for="todoTitle">タイトル</label>
                            <input type="text" id="todoTitle" class="form-control" name="title" value="{{ old('title', $todo->title) }}">
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="todoCategory">カテゴリ</label>
                            <select id="todoCategory" class="form-control" name="todo_category_id">
                                <option value="">選択してください。</option>
                                @foreach ($todo_categories as $todo_category)
                                    <option value="{{ $todo_category->id }}" @if (old('todo_category_id', $todo->todo_category_id) == $todo_category->id) selected @endif>
                                        {{ $todo_category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('todo_category_id'))
                                <span class="text-danger">{{ $errors->first('todo_category_id') }}</span>
                            @endif
                        </div>
                        @if ($action == 'edit')
                            <div class="form-group">
                                <label for="todoStatus">状態</label>
                                <select id="todoStatus" class="form-control" name="status">
                                    @foreach ($status_list as $key => $val)
                                        <option value="{{ $key }}" @if (old('status', $todo->status) == $key) selected @endif>
                                            {{ $val }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('status'))
                                    <span class="text-danger">{{ $errors->first('status') }}</span>
                                @endif
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="todoDeadline">期限</label>
                            <input type="date" id="todoDeadline" class="form-control" name="deadline" value="{{ old('deadline', optional($todo->deadline)->format('Y-m-d')) }}">
                            @if ($errors->has('deadline'))
                                <span class="text-danger">{{ $errors->first('deadline') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="todoText">メモ</label>
                            @if ($errors->has('text'))
                                <span class="text-danger">{{ $errors->first('text') }}</span>
                            @endif
                            <textarea class="form-control" id="todoText" name="text" rows="5">{{ old('text', $todo->text) }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" style="width:100px;">@if ($action == 'edit') 更新 @else 追加 @endif</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection