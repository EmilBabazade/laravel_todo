@extends('layouts.app')
@section('title')
    {{ $viewData['title'] }}
@endsection
@section('content')
    <a href="{{ route('todos.newTodoPage') }}" class="btn btn-primary">Add Todo</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Task Id</th>
                <th scope="col">Task</th>
                <th scope="col">Due Date</th>
                <th scope="col">Done</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($viewData['tasks'] as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->due_date }}</td>
                    <td>
                        @if ($task->done == 1)
                            <span class="text-success">
                                <i class="bi bi-check2"></i>
                            </span>
                        @else
                            <span class="text-danger">
                                <i class="bi bi-exclamation-diamond"></i>
                            </span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex">
                            <a class="btn btn-primary mx-2" href="{{ route('todos.updateTodoPage', $task->id) }}">
                                <i class="bi-pencil"></i>
                            </a>
                            <form action="" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">
                                    <i class="bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $viewData['tasks']->links('pagination::bootstrap-5') !!}
@endsection
