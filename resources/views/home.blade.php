@extends('master.layout')

@section('content')   

<div class="container mt-5">
    <h2>Create Task</h2>
    <form action="/submit" method="POST">
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
            
       
        <!-- CSRF Token for Laravel -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
            <label for="title">User(Full name)</label>
            <input type="text" class="form-control" id="title" name="user" placeholder="Full name" required>
        </div>
        
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter task title" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter task description"></textarea>
        </div>

        <div class="form-group">
            <label for="is_completed">Completion Status</label>
            <select class="form-control" id="is_completed" name="is_completed">
                <option value="Not Completed">Not Completed</option>
                <option value="Completed">Completed</option>
            </select>
        </div>

        <div class="form-group">
            <label for="due_date">Due Date</label>
            <input type="datetime-local" class="form-control" id="due_date" name="due_date">
        </div>
        <div class="row">
            <div class="col-6">
                <button type="submit" class="btn btn-primary">Create New Task</button>
            </div>
            <div class="col-6" style="float: right;" >
                <a href="/todoinfo" type="button" class="btn btn-primary">Check Todo List</a>
            </div>
        </div>
    </form>
</div>
    
@endsection