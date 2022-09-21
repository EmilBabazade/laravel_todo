<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

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

    /**
     * Show the todo update page.
     */

    /**
     * Create a new todo.
     */

    /**
     * Delete a todo.
     */

    /**
     * Update a todo.
     */
}
