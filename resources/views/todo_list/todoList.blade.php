@extends('layouts_todo.app')
@section('title')
    Todos List
@endsection

@section('content')
    <h1 class="text-center my-5">TODOS PAGE</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    Todos
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($user as $users)
                            @if (!$users->completed)
                                <li class="list-group-item">
                                    {{ $users->todo }}

                                    <a href="todoList/delete/{{ $users->id }}" class="btn btn-danger btn-sm float-right"
                                        style="margin-left: 4px">Delete</a>

                                    <a href="todoList/show/{{ $users->id }}" class="btn btn-primary btn-sm float-right"
                                        style="margin-left: 4px">View</a>
                                    @if (!$users->completed)
                                        <a class="btn btn-warning btn-sm float-right" style="color: white"
                                            href="todo/completed/{{ $users->id }}">Completed</a>
                                    @endif
                                </li>
                            @endif

                            @if ($users->completed)
                                <li class="list-group-item" style="background-color: lavender;">
                                    {{ $users->todo }}

                                    <a href="todoList/delete/{{ $users->id }}" class="btn btn-danger btn-sm float-right"
                                        style="margin-left: 4px">Delete</a>

                                    <a href="todoList/show/{{ $users->id }}" class="btn btn-primary btn-sm float-right"
                                        style="margin-left: 4px">View</a>
                                    @if (!$users->completed)
                                        <a class="btn btn-warning btn-sm float-right" style="color: white"
                                            href="todo/completed/{{ $users->id }}">Completed</a>
                                    @endif
                                </li>
                            @endif
                        @endforeach
                        <li class="list-group-item">
                            <form action="addtodoList" method="post">
                                @csrf
                                <input type="text" name="todo" placeholder="todo..." class="input">
                                <button class="btn btn-primary btn-sm float-right">Add</button>
                        </li>
                        <li class="list-group-item">
                            <textarea name="description" placeholder="description..." cols="84" rows="5" class="desc"></textarea>
                        </li>
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
