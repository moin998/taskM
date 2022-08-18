@extends('layouts.app')

@section('content')

    <div>
        <h1>Create Post</h1>
 
{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
        <form action="{{url('/categories')}}" method="POST">
            @csrf
            <div class="card-body">
            <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"  placeholder="name">
            </div>
            @error('name')
                <p style="color:red">{{ $message }}</p>
            @enderror
 
            
            <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
    </div>
@endsection