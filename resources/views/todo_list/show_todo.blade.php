@extends('layouts_todo.app')
@section('title')
    Single Todo: {{ $todo->name }}
    demo
@endsection

@section('content')
    <form action="{{ url('edit', $todo->id) }}" method="Post">
        @csrf
        <h1 class="text-center my-5">
            <div id="t_hide"> {{ $todo->todo }}</div>
            <div id="t_show" style="display: none;">
                <input type="text" name="todo" value="{{ $todo->todo }}" class="input">
            </div>
        </h1>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-default">
                    <div class="card-header">
                        Details
                        <a class="btn btn-secondary btn-sm float-right" href="/" style="color: white">Back</a>
                    </div>

                    <div class="card-body">
                        <textarea name="description" cols="84" rows="5" class="desc" style="display: none;" id="edit">{{ $todo->description }}</textarea>
                        <div id="hide">{{ $todo->description }}</div>

                    </div>
                    <a class="btn btn-primary btn-sm float-right" onclick="up()" id="ed"
                        style="color: white">edit</a>
                    <button class="btn btn-primary btn-sm float-right" id="up" style="display: none;">Update</button>
                </div>
            </div>
        </div>
    </form>

    <script>
        function up() {
            document.getElementById('ed').style.display = "none";
            document.getElementById('up').style.display = "block";

            document.getElementById('edit').style.display = "block";
            document.getElementById('hide').style.display = "none";

            document.getElementById('t_show').style.display = "block";
            document.getElementById('t_hide').style.display = "none";
        }
    </script>
@endsection
