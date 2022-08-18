@extends('layouts.app')

@section('content')
    <div class="div">
        <h1>Categories</h1>
    </div>
    <div>
        <a href="{{url('/categories/create')}}" class="btn btn-info">Create New Category</a>


        <table class="table table-striped" id="myTable">
            <thead>
              <tr>
                <th scope="col">SL</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
                
              </tr>
            </thead>
            <tbody>
            @php
                $sl=1;
            @endphp
                @foreach ($category_list as $category)
            <tr>
                <th > {{$sl++}}</th>
                <td>{{$category->name}}</td>
                <td>
                    <a href="{{url("/categories/$category->id/edit")}}" class="btn btn-info btn-sm">Edit</a>
                    <form action="{{url("/categories/$category->id")}}" method="POST" onsubmit="return confirm('Do you want to delete this category');">
                        @csrf
        
                       <button type="submit" class="btn btn-danger btn-sm">Delete</button>  
                </td>
            </tr>
                @endforeach
              
           
            </tbody>
          </table>
          {{$category_list->links()}}
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endpush

@push('scripts')
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
             $('#myTable').DataTable();
        } );
    </script>
@endpush