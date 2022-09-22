@extends('layouts.app')
@section('title')
    New Todo
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add a todo</div>
                    @if ($errors->any())
                        <ul class="alert alert-danger list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>- {{ $error }}</li>
                            @endforeach

                        </ul>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('todos.addTodo') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-end">Title</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="due_date" class="col-md-4 col-form-label text-md-end">Due Date</label>

                                <div class="col-md-6">
                                    <input id="due_date" type="date" class="form-control" name="due_date" required>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary text-white">
                                        Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
