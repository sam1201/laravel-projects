@php
    
    use Illuminate\Support\Facades\Auth;
    use App\role;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/app.css">
    <style>
    .link{
        transition: all .5s;
        position: relative;
    }
    .link:hover{
        text-decoration: none;
    }
    .link:after{
        content:'';
        position: absolute;
        bottom:0;
        left:0;
        background:#567ffc;
        height:1px;
        width:0;
        transition: all .5s;
    }
    .link:hover::after{
        width:100%;
    }
    .inline{
        display: inline-block;
    }
    .pull-right{
        float:right;
    }
    .flexbox{
        display: flex;
        justify-content: space-between;
    }
    .flexbox>*:first-child{
        margin-right:5px;
    }
    .page-top{
        margin:10px 0;
    }
    </style>
        <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Sample') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        {{-- <span class="navbar-toggler-icon"></span> --}}
                    </button>
    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            <li><a href="/product" class="nav-link">Product</a></li>
                        <li><a href="/category" class="nav-link {{(url()->current()=='category')? 'active':''}} ">Category</a></li>
                       @if (Auth::User()->role->name=='admin')
                       <li><a href="/user" class="nav-link">Users</a></li>
                       @endif
                       <li><a href="/tag" class="nav-link">Tags</a></li>
                        </ul>
    
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
    
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
    @yield('container')


    <div class="container">
            @if (count($errors))
            <ul class="bg-danger">
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>    
                @endforeach
            </ul>
            @endif
    </div>
   
</body>
</html>