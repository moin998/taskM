@extends('layouts.app')

@section('content')
    <div class="div">
        <h1>Tasks</h1>
    </div>
    <div>
        <a href="{{url('/tasks/create')}}" class="btn btn-info">Create New Task</a>


        <table class="table table-striped" id="myTable">
            <thead>
              <tr>
                <th scope="col">SL</th>
                <th scope="col">Title</th>
                <th scope="col">Category   </th>
                <th scope="col">Deadline</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
                
              </tr>
            </thead>
            <tbody>
            @php
                $sl=1;
            @endphp
                @foreach ($tasks as $task)
            <tr>
                <th > {{$sl++}}</th>
                <td>{{$task->title}}</td>
                <td>{{$task->category->name}}</td>
                <td>{{$task->deadline}}</td>
                <td>{{App\Enums\StatusType::getDescription($task->status)}}</td>
                <td>
                    <a href="{{url("/tasks/$task->id/edit")}}" class="btn btn-info btn-sm">Edit</a>
                    <form action="{{url("/tasks/$task->id")}}" method="POST" onsubmit="return confirm('Do you want to delete this task');">
                        @csrf
        
                       <button type="submit" class="btn btn-danger btn-sm">Delete</button>  
                </td>
            </tr>
                @endforeach
              
           
            </tbody>
          </table>
    </div>
@endsection

