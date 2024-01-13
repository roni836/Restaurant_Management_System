@extends('home.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4 mx-auto mt-4">
            <div class="card">
                <div class="card-header">Create New Account</div>
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control">
                            @error('name')                                   
                            <p class="small text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Contact</label>
                            <input type="text" name="contact" value="{{old('contact')}}" class="form-control">
                            @error('contact')                                   
                            <p class="small text-danger">{{$message}}</p>
                            @enderror
                        </div>
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
                            <input type="submit" value="Create New Account" class="btn btn-success w-100">
                        </div>
                    </form>
                    <div class="row">
                        <a href="{{route('login')}}">Already Register?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection