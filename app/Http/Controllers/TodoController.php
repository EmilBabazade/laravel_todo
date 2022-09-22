<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;
use Barryvdh\Debugbar\Facade as Debugbar;
use DateTime;

class TodoController extends Controller
{

    /**
     * Show the todos list.
     */
    public function index()
    {
        $userId = Auth::id();
        $viewData = [];
        $viewData['title'] = 'Tasks';
        $viewData['tasks'] = Todo::where(['user_id' => $userId])
            ->latest()
            ->paginate(5);
        return view('todos.todos')->with('viewData', $viewData);
    }

    /**
     * Show the todo create page.
     */
    public function newTodoPage()
    {
        $viewData = [];
        $viewData['title'] = 'Add Todo';
        return view('todos.newTodo')->with('viewData', $viewData);
    }

    /**
     * Show the todo update page.
     */
    public function updateTodoPage(int $id)
    {
        $viewData['todo'] = Todo::findOrFail($id);
        return view('todos.updateTodo')->with('viewData', $viewData);
    }

    /**
     * Create a new todo.
     */
    public function newTodo(Request $request)
    {
        $request->validate([
            "title" => "required|max:255",
            "due_date" => "required",
            // "done" => "required",
        ]);

        $userId = Auth::id();

        $newTodo = new Todo();
        $newTodo->title = $request->input('title');
        $newTodo->due_date = $request->input('due_date');
        $newTodo->done = false;
        $newTodo->user_id = $userId;
        $newTodo->save();

        return redirect()->route('todos.todos');
    }

    /**
     * Update a todo.
     */
    public function updateTodo(int $id, Request $request)
    {
        Debugbar::info($request);
        $request->validate([
            "title" => "required|max:255",
            "due_date" => "required"
        ]);


        $todo = Todo::findOrFail($id);
        $todo->title = $request->input('title');
        $todo->due_date = DateTime::createFromFormat('Y-m-d', $request->input('due_date'));
        $todo->done = $request->input('done') == 'on' ? 1 : 0;
        $todo->save();

        return redirect()->route('todos.todos');
    }

    /**
     * Delete a todo.
     */
    public function deleteTodo(int $id)
    {
        Todo::destroy($id);
        return back();
    }
}
