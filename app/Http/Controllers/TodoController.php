<?php

namespace App\Http\Controllers;
use App\Models\Todo;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function todolist()
    {
        $user = User::findOrFail(Auth::id())->todos;
        return view('todo_list.todoList', compact('user'));
    }

    public function showTodo($id)
    {
        $todo = Todo::findOrFail($id);
        return view('todo_list.show_todo', compact('todo'));
    }

    public function addtodoList(Request $request)
    {
        $request->validate([
            'todo' => 'required',
            'description' => 'required'
        ]);

        $success = Todo::create([
            'todo' => $request->todo,
            'description' => $request->description,
            'completed' => 0,
            'user_id' => Auth::id(),
        ]);

        if($success)
            return redirect('/')->with('success', 'Successfully added');
        else
            return redirect('/')->with('failed', 'Failed to add');
    }

    public function deleteTodo($id)
    {
        $todo = Todo::findOrFail($id);
        $success = $todo->destroy($id);
        if($success)
            return redirect('/')->with('success', 'Successfully deleted');
        else
            return redirect('/')->with('failed', 'Failed to deleted');
    }

    public function editTodo(Request $request, $id)
    {
        $request->validate([
            'todo' => 'required',
            'description'=> 'required',
        ]);
        $todo = Todo::findOrFail($id);
        $todo->todo = $request->todo;
        $todo->description = $request->description;
        $success = $todo->save();

        if($success)
            return redirect('/')->with('success', 'Successfully edit');
        else
            return redirect('/')->with('failed', 'Failed to edit');
    }

    public function completed($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->completed = 1;
        $success = $todo->update();

        if($success)
            return redirect('/')->with('success', 'you have completed a task');
        else
            return redirect('/')->with('failed', 'Failed to completed a task');
    }
}
