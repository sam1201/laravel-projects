@extends('category.master')
@php
    use Illuminate\Support\Facades\Auth;
@endphp
@section('container')
    <div class="container">
        
            @if(count($tags)==0 || count($category)==0)
            
                <h3>Product cannot be added unless there is a cateory and tag</h3>
            @else
                <h2>Product List</h2>
                
                <a href="/product/create" class="link">Add Product</a>
            
                <table class="table">
                    <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Tags</th>
                                @if (Auth::User()->role_id==1)
                                    <th>
                                            Added By
                                    </th>
                                @endif
                                <th>Options</th>
                            </tr>
                    </thead>

                @if(count($products))
                
                    @foreach ($products as $product)
                                <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>
                                
                                @php
                                        $info = \App\product::find($product->id);
                                    
                                    echo $info->category->name;
                                @endphp
                                
                                </td>
                                
                                <td>
                                   {{-- @foreach ($product->tags as $tag) --}}
                                       @php
                                           echo implode(", ",$product->tags->pluck('name')->toArray())
                                       @endphp
                                   {{-- @endforeach --}}
                                   
                                </td>

                                {{-- display the owner of product only if user has role of admin --}}
                                @if (Auth::User()->role_id==1)
                                        <td>
                                            @php
                                                $owner  = \App\product::find($product->id)->user->name;
                                                echo $owner;
                                            @endphp
                                        </td>
                                    @endif

                                <td>
                                        
                                    <form action="/product/{{$product->id}}/edit" method="get" class="inline">
                                    
                                        <button type="submit" class="btn btn-primary">Edit</button>
                                    </form>
                                    <form action="/product/{{$product->id}}" method="post" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>

                                </td>
                            </tr>
                    @endforeach
                
                @else
                    <h3>Click on Add product to add new product</h3>
                @endif
                    </table>
        @endif
    </div>
@endsection