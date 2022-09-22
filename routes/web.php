<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('authTodos')->group(function () {
    Route::get('/', 'App\Http\Controllers\TodoController@index')->name('todos.todos');
    Route::get('/newTodoPage', 'App\Http\Controllers\TodoController@newTodoPage')->name('todos.newTodoPage');
    Route::post('/newTodo', 'App\Http\Controllers\TodoController@newTodo')->name('todos.addTodo');
    Route::get('/updateTodoPage/{id}', 'App\Http\Controllers\TodoController@updateTodoPage')->name('todos.updateTodoPage');
    Route::put('/updateTodo/{id}', 'App\Http\Controllers\TodoController@updateTodo')->name('todos.updateTodo');
});

Auth::routes();
