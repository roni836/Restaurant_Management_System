<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env("APP_NAME")}} - Taste Better</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <style>
        .wow{
            box-shadow: 2px 2px 4px #aaaaaa;
        }
        .wow:hover{
            box-shadow: 6px 6px 25px #aaaaaa;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div class="navbar navbar-expand-lg navbar-dark bg-danger fixed-top">
        <div class="container">
            <a href="{{route('home.index')}}" class="navbar-brand">{{env("APP_NAME")}}</a>

            <div class="navbar-nav nav">
                <a href="{{route('home.index')}}" class="nav-link nav-item active">Home</a>

                @auth
                <a href="" class="nav-link nav-item active text-capitalize">{{auth()->user()->name}}</a>
                <a href="{{route('myOrder')}}" class="nav-link nav-item active">My Order</a>
                <a href="{{route('logout')}}" class="nav-link nav-item active">Logout</a>
                <a href="{{route('cart')}}" class="nav-link nav-item active">My Cart <span class="bi bi-cart-plus"></span></a>

                @endauth

                @guest
                <a href="{{route('signup')}}" class="nav-link nav-item active">Create an Account</a>
                <a href="{{route('login')}}" class="nav-link nav-item active">Login</a>
                @endguest              
            </div>
        </div>
    </div>

    <div class="container"style="margin-top:6rem;">

    </div>
    
    
    @section('content')

    @show
        <script>
           toastr.options ={
            "closeButton" : true,
           } 

        @if(session('error'))
            toastr.error("{{session('error')}}") 
        @endif
        @if(session('success'))
           toastr.success("{{session('success')}}")
        @endif
           
        </script>
   


</body>
</html>