@extends('category.master')

@section('container')
<div class="container">
    <h3>{{$data[0]->name}}</h3>

<a href="/category/{{$data[0]->id}}/edit">Edit</a>
<form action="/category/{{$data[0]->id}}" method="post">
@csrf
@method('DELETE')

<div class="form-group">
    <button type="submit" class="btn">Delete Button</button>
</div>
</form>
</div>

    
@endsection