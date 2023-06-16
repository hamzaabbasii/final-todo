
@extends('layouts.app-layout')
@section('content')

<div class="container custom-container" style="width:900px; height:601px;">
    <div class="p-4">
      <h2 class="text-center mb-4" >Add Task</h2>
      <form method="post" action="{{}}">
        @csrf
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <input type="text" class="form-control" id="category" name="category" placeholder="Enter category">
          </div>
          <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status">
              <option value="Pending">Pending</option>
              <option value="In-progress">In Progress</option>
              <option value="Completed">Completed</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        
        </div>
        <button type="submit" class="btn btn-primary btn-block custom-btn">Add Task</button>
        <a href="{{ url('/alltask') }}" class="btn btn-secondary btn-block mt-3 custom-btn">View All Tasks</a>
      </form>
    </div>
  </div>
@endsection