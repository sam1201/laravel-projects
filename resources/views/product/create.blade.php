@extends('category.master')

@section('container')
    <div class="container">
        <h2>Add Product</h2>
        <form action="/product" method="post">
            @csrf
            <div class="form-group">
                <input type="text" name="name" class="form-control" value="{{ old('name') }}"> 
            </div>
            @if (count($categories))
                <div class="form-group">
                        <label for="category">category</label>
                        <select name="category" id="category">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                </div>
            @endif

                <div class="form-group">
                    <label for="Tags">Select one of the tags</label>
                    @foreach ($tags as $tag)
                            <input type="checkbox" name="tags[]" value="{{$tag->id}} " >{{$tag->name}}
                    @endforeach
                </div>
                <div class="form-group">
                    <button type="submit" class="btn">Add Product</button>
                </div>
        </form>
   
    </div>
@endsection