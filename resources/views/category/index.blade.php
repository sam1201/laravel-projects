@extends('category.master')

@section('container')
    <div class="container">
        <h2>Product Categories</h2>
        @if ($user_id==1)
        <a href="/category/create" class="link">Add Category</a>
        @endif
        @if (count($categories))
        <table class="table">
            <tr>
                <th>ID</th>                
                <th>Name</th>
                @if ($user_id==1)
                <th>Options</th>
                @endif
            </tr>
        
        @foreach ($categories as $category)
        <tr>
        <td>{{$category->id}}</td>
        <td>{{$category->name}}</td>
        @if ($user_id==1)
        <td>
                <form action="/category/{{$category->id}}/edit" method="get" class="inline">
            
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>

                <form action="/category/{{$category->id}}" method="post" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
        </td>
        @endif
        </tr>
        @endforeach
        </table>
        @endif
        
    </div>
@endsection