@extends('category.master')

@section('container')
    <div class="container">
        <a href="/tag/create" class="link">Add Tag</a>
        @if (count($tags)>0)
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->name}}</td>
                            <td>
                                <form action="/tag/{{$tag->id}}/edit" method="get" class="inline">
                            
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </form>
                                <form action="/tag/{{$tag->id}}" method="post" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        @else
            <h3>Tags does not exist</h3>
        @endif
    </div>
@endsection