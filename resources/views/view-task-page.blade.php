@extends('layouts.app-layout')
@section('content')
<div class="container custom-container mt-5">
    <div class=" p-4" style="border-radius: 1rem; background-color: white;">

      <h2 class="text-center mb-4" >View Tasks</h2>
      {{-- <div class="d-flex justify-content-end align-items-center mb-4 pt-2 pb-3">
        <p class="small mb-0 me-2 text-muted">Filter</p>
        <select class="select">
          <option value="1">All</option>
          <option value="2">Completed</option>
          <option value="3">Active</option>
          <option value="4">Has due date</option>
        </select>
        <p class="small mb-0 ms-4 me-2 text-muted">Sort</p>
        <select class="select">
          <option value="1">Added date</option>
          <option value="2">Due date</option>
        </select>
        <a href="#!" style="color: #23af89;" data-mdb-toggle="tooltip" title="Ascending"><i
            class="fas fa-sort-amount-down-alt ms-2"></i></a>
      </div> --}}

      <table class="table">
        <thead>
          <tr>
            <th scope="col" >Title</th>
            <th scope="col" >Description</th>
            <th scope="col" >Start Date</th>
            <th scope="col" >End Date</th>
            <th scope="col" >Status</th>
            <th scope="col" >Actions</th>
          </tr>
        </thead>
        @foreach ($task as $tasks)
        <tbody>
          <tr>
            <td>{{$tasks->title}}</td>
            <td>{{$tasks->description}}</td>
            <td>{{$tasks->startDate}}</td>
            <td>{{$tasks->endDate}}</td>
            <td>@if($tasks->status === 'Active')
              <span class="badge badge-primary">Active</span>
          @elseif($tasks->status === 'Ending Soon')
              <span class="badge badge-warning">Ending Soon</span>
          @elseif($tasks->status === 'Completed')
              <span class="badge badge-success">Completed</span>
          @endif
            </td>
            <td>
              <a href="{{route('edittask.edit', ['id'=> $tasks->id])}}" class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
              <a href="#" data-toggle="modal" data-target="#confirmDeleteModal" class="btn btn-sm btn-danger"><i class="bi bi-x-square"></i></a>
            </td>
          </tr>       
        </tbody>

        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Are you sure you want to delete this task?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form action="{{route('deletetask.show', ['id' => $tasks->id])}}" method="GET" style="display: inline">
                  @csrf
                  <button type="submit" class="btn btn-danger">Delete</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </table>
      <div class="text-center mt-3">
        <a href="{{ route('newtask.add')}}" class="btn btn-primary">Create New Task</a>
      </div>
    </div>
  </div>  
@endsection