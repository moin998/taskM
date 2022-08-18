@extends('layouts.app')

@section('content')

    <div>
        <h1>Create Tasks</h1>
 
{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
        <form action="{{'/tasks'}}" method="POST">
            @csrf
            <div class="card-body">
            <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"  placeholder="Enter title">
            </div>
            @error('title')
                <p style="color:red">{{ $message }}</p>
            @enderror


            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" class="form-control @error('description') is-invalid @enderror"  placeholder="Enter description">
            </div>
                @error('description')
                    <p style="color:red">{{ $message }}</p>
                @enderror

            <div class="form-group">
                <label for="category">Category</label>
                <select name="category_id" id="" class="form-control">
                        <option value="">Please  select </option>
                        @foreach ($categories  as $category)
                            <option value="{{$category->id}}"{{old('category_id')==$category->id ? 'selected ':''}}>{{$category->name}}</option>
                        @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="" class="form-control">
                        <option value="">Please  select status </option>
                        @foreach ($status_list  as $key=>$value)
                            <option value="{{$key}}" {{old('status')==strval($key) ? 'selected': ''}}>{{$value}}</option>
                        @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="deadline">Deadline</label>
                <input type="date" name="deadline" class="form-control @error('deadline') is-invalid @enderror"  placeholder="name">
            </div>
                @error('deadline')
                    <p style="color:red">{{ $message }}</p>
                @enderror
            
 
            
            <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
    </div>
@endsection