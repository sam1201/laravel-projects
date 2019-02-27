@extends('category.master')

@section('container')

<div class="container">
    <h2>Edit Product Info</h2>
<form action="/product/{{$product->id}}" method="post">
    @csrf
    @method('PATCH')

    <div class="form-group">
    <input type="text" class="form-control" name="name" value="{{$product->name}}">
    </div>

    <div class="form-group">
        <select name="category">
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="Tags">Select one of the tags</label>
       
        @foreach ($tags as $tag)

        <input type="checkbox" name="tags[]" value="{{$tag->id}}"
           @foreach ($used_tags as $used)
               @if ($tag->id==$used->id)
                    checked     
               @endif
           @endforeach
           > {{$tag->name}}
        @endforeach
    </div>
    
    <div class="form-group">
        <button type="submit" class="btn">Update Product</button>
    </div>
    </form>

</div>
    
@endsection