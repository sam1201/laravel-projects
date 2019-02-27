@extends('category.master')

@section('container')
    <div class="container">
        
        <div>
                <span class="sub-heading">Product Name:</span>
                <span class="detail">{{$product->name}}</span>
        </div>
        <div>

        </div>
        <a href="/product/{{$product->id}}/edit" class="link">Edit</a>

        
    
    </div>
@endsection