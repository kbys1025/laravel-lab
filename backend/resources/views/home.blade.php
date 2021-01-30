@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img alt="todo_logo" class="card-img-top" src="{{ asset('/img/todo.svg') }}">
                        <div class="card-body  mx-auto">
                            <h3 class="card-title">ToDo</h3>
                            <a href="todos" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
