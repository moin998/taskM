@extends('layouts.app')

@section('content')

    <div>
        <h1>Edit Tasks</h1>
 
        <form action="{{"/tasks/$task->id"}}" method="POST">
            @method('PUT')
            @csrf
            <div class="card-body">
            <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" value="{{$task->title}}" class="form-control  @error('title') is-invalid @enderror"  placeholder="Enter title">
            </div>
            @error('title')
                <p style="color:red">{{ $message }}</p>
            @enderror


            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" value="{{$task->description}}" class="form-control @error('description') is-invalid @enderror"  placeholder="Enter description">
            </div>
                @error('description')
                    <p style="color:red">{{ $message }}</p>
                @enderror

            <div class="form-group">
                <label for="category">Category</label>
                <select name="category_id" id="" class="form-control">
                        <option value="">Please  select </option>
                        @foreach ($categories  as $category)
                            <option value="{{$category->id}}"{{$task->category->id == $category->id ? 'selected ':''}}>{{$category->name}}</option>
                        @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="" class="form-control">
                        <option value="">Please  select status </option>
                        @foreach ($status_list  as $key=>$value)
                            <option value="{{$key}}" {{$task->status==strval($key) ? 'selected': ''}}>{{$value}}</option>
                        @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="deadline">Deadline</label>
                <input type="date" name="deadline" value="{{$task->deadline}}" class="form-control  @error('deadline') is-invalid @enderror"  placeholder="name">
            </div>
                @error('deadline')
                    <p style="color:red">{{ $message }}</p>
                @enderror
            
 
            
            <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
    </div>
@endsection