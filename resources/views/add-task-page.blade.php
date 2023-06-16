
@extends('layouts.app-layout')
@section('content')

<div class="container custom-container" style="width:900px; height:601px;">
    <div class="p-4">
      <h2 class="text-center mb-4" >Add Task</h2>
      <form method="post" action="{{url('/')}}/newtask">
        @csrf
        <div class="form-group">
          <label for="taskTitle">Task Title</label>
          <input type="text" name="taskTitle" class="form-control" id="taskTitle" placeholder="Enter task title" required>
        </div>
        <div class="form-group">
          <label for="taskDescription">Task Description</label>
          <textarea class="form-control" name="taskDescription" id="taskDescription" rows="3" placeholder="Enter task description" required></textarea>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="startDate">Start Date</label>
            <input type="date" name="startDate" value="{{\Carbon\Carbon::now()->toDateString()}}" class="form-control" id="startDate" required>
          </div>
          <div class="form-group col-md-6">
            <label for="endDate">End Date</label>
            <input type="date" name="endDate" class="form-control" id="endDate" required>
          </div>
          <div class="form-group">
            <label for="taskStatus">Task Status</label>
            <select name="taskStatus" class="form-control" id="taskStatus">
                <option value="Active" >Active</option>
                <option value="Ending Soon" >Ending Soon</option>
                <option value="Completed" >Completed</option>
            </select>
        </div>
        
        </div>
        <button type="submit" class="btn btn-primary btn-block custom-btn">Add Task</button>
        <a href="{{ url('/alltask') }}" class="btn btn-secondary btn-block mt-3 custom-btn">View All Tasks</a>
      </form>
    </div>
  </div>
@endsection