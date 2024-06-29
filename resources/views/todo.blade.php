@extends('master.layout')

@section('content')
<div class="container mt-5">
    <h2>To-Do List</h2>
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>1
    @endif

    @if(session()->has('delete'))
        <div class="alert alert-danger">
            {{ session('delete') }}
        </div>
    @endif

    <table id="tasksTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Due Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->users }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->is_completed ? 'Completed' : 'Not Completed' }}</td>
                    <td>{{ $task->due_date }}</td>
                    <td> <a href="/delete/{{ $task->id }}">Delete</a>/////
                        <a href="/edit/{{ $task->id }}">Edit</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection