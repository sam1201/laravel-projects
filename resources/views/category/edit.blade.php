@extends('category.master')

@section('container')
    <div class="container">
        <h2>Edit Category</h2>
    <form action="/category/{{$data[0]->id}}" method="post">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <input type="text" name="name" class="form-control"
        value="{{$data[0]->name}}" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn">Update</button>
        </div>
    
    </form>
    </div>
@endsection