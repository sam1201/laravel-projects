@extends('category.master')

@section('container')
    <div class="container">
            <h1>Create Tag</h1>
            <form action="/tag" method="post">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            </div>
    
            <div class="form-group">
                <button type="submit" class="btn">Create Tag</button>
            </div>
            </form>
    
    </div>
@endsection