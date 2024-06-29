@extends('master.layout')

@section('content')   

<div class="container mt-5">
    <h2>Create Task</h2>
  
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
            
    <form action="/update/{{ $edit->id }}" method="POST">
        <!-- CSRF Token for Laravel -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
            <label for="title">User(Full name)</label>
            <input type="text" class="form-control" id="title" value="{{ $edit->users }}" name="user" placeholder="Full name" required>
        </div>
        
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" value="{{ $edit->title }}" name="title" placeholder="Enter task title" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description"  rows="3" placeholder="Enter task description">{{ $edit->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="is_completed">Completion Status</label>
            <select class="form-control" id="is_completed" name="is_completed">
                <option value="">Select status</option>
                <option value="Not Completed" @if ($edit->is_completed == 'Not Completed') selected='selected' @endif>Not Completed</option>
                <option value="Completed" @if ($edit->is_completed == 'Completed') selected @endif>Completed</option>
            </select>
        </div>

        <div class="form-group">
            <label for="due_date">Due Date</label>
            <input type="datetime-local" value="{{ $edit->due_date }}" class="form-control" id="due_date" name="due_date">
        </div>
        <div class="row">
            <div class="col-6">
                <button type="submit" class="btn btn-primary">Update Task</button>
            </div>
            <div class="col-6" style="float: right;" >
                <a href="/home" type="button" class="btn btn-primary">Create New Task</a>
            </div>
        </div>
        
        
    </form>
</div>
    
@endsection