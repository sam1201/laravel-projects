@extends('category.master')

@section('container')
    <div class="container">
    <h3>Update Tag Name ({{$tag->name}})</h3>
        {!! Form::open(['method'=>'patch','action'=>['tagcontroller@update',$tag->id]]) !!}
            @csrf

            {!! Form::text('name',$tag->name,['class'=>'form-control','placeholder'=>'Enter new Tag Name']) !!}

            {!! Form::submit('Update',['class'=>'btn']) !!}
        {!! Form::close() !!}
    </div>
@endsection