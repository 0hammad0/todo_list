<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

Route::get('/mail', function(){
    $data = [
        'title' => 'This is a test',
        'content' => 'content test',
    ];

    Mail::send('mail.mailContent', $data, function ($message) {
        $message->to('hammadazam101010@gmail.com', 'Hammad');
        $message->subject('This a teeest');
    });
});

Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('/', [TodoController::class, 'todolist'])->name('todoList');
    Route::get('todoList/show/{id}', [TodoController::class, 'showTodo'])->name('showTodo');
    Route::post('addtodoList', [TodoController::class, 'addtodoList'])->name('addtodoList');
    Route::get('todoList/delete/{id}', [TodoController::class, 'deleteTodo'])->name('deleteTodo');
    Route::post('edit/{id}', [TodoController::class, 'editTodo']);
    Route::get('todo/completed/{id}', [TodoController::class, 'completed'])->name('completed');
});

require __DIR__.'/auth.php';
