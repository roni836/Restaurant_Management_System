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
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-4 mx-auto mt-4">
                <div class="card">
                    <div class="card-header">Admin Login Page</div>
                    <div class="card-body">
                        <form action="" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input type="email" name="email" value="{{old('email')}}" class="form-control">
                                @error('email')                                   
                                <p class="small text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Password</label>
                                <input type="password" name="password" value="{{old('password')}}" class="form-control">
                                @error('password')
                                <p class="small text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="submit" value="Admin Login" class="btn btn-danger w-100">
                            </div>
                        </form>
                        @if (session('msg'))
                            <div class="alert alert-danger">
                                {{session('msg')}}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

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