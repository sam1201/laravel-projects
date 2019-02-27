@extends('category.master')

@section('container')
    <div class="container">
        <h1>Create Product Category</h1>
        <form action="/category" method="post">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <button type="submit" class="btn">Create Category</button>
        </div>
        </form>

     
        
    </div>
@endsection