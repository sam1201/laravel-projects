@extends('category.master')
@php
    use App\User;
    use App\role;
@endphp
@section('container')
    <div class="container">
        
        <div class="page-top">
            <h3 class="inline">Users</h3>

            {{-- <form action="/user/search" method="get" class="inline pull-right flexbox">
                <input type="text" class="form-control inline">
                <button type="submit" class="btn btn-primary">find</button>
            </form> --}}

            {!! Form::open(['url'=>'user','method'=>'post','action'=>'UserController@findUser','class'=>'inline pull-right flexbox']) !!}
            @csrf
                {!! Form::text('name','',['class'=>'form-control inline','placeholder'=>'Enter name']) !!}

                {!! Form::submit('Find',['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Options</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->username}}</td>
                    <td>
                     @php
                         $user = App\User::find($user->id);
                         echo $user->role->name
                     @endphp
                    </td>
                    <td>
                        {{$user->email}}
                    </td>
                    <td>
                            <form action="/user" method="post" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete </button>
                            </form>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <a href="/register" class="link">Add User</a> --}}
    </div>
@endsection