<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel | {{env("APP_NAME")}} - Taste Better</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>
<body>

    <div class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="" class="navbar-brand">Admin Panel-{{env("APP_NAME")}}</a>

            <div class="navbar-nav nav">
                <a href="{{route("adminLogout")}}" class="nav-link nav-item">Logout</a>
            </div>
        </div>
    </div>
    
    <div class="navbar navbar-expand-lg navbar-dark bg-secondary py-0 small">
        <div class="container">
            <div class="navbar-nav nav">
                <a href="{{route("admin.dashboard")}}" class="nav-link nav-item">Home</a>
                <a href="{{route("admin.category")}}" class="nav-link nav-item">Manage Category</a>
                <a href="{{route("admin.cart.index")}}" class="nav-link nav-item">Manage Cart</a>
                <a href="{{route("admin.product.index")}}" class="nav-link nav-item">Manage Products</a>
                <a href="{{route("admin.product.insert")}}" class="nav-link nav-item">Insert New Product</a>
            </div>
        </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></>
</body>
</html>