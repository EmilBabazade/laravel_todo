@extends('layouts.app')
@section('title')
    {{ $viewData['title'] }}
@endsection
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Task No</th>
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
                    <td>{{ $task->done }}</td>
                    <td>
                        <a class="btn btn-primary mb-2" href="#">
                            <i class="bi-pencil"></i>
                        </a>
                        <form action="" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">
                                <i class="bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $viewData['tasks']->links('pagination::bootstrap-5') !!}
@endsection
