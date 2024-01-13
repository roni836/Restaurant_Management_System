@extends('home.base')

@section('content')
    
    <div class="container">
        <div class="row ">
            <div class="col-7">
                <h2>Checkout Here</h2>
                <div class="card mt-4">
                    <div class="card-header">
                        <div>Add New Address</div>
                        <div class="text-danger">* Required Fields</div>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" >
                            @csrf
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <label for="">Full Name</label>
                                        <input type="text" value="{{old('fullname')}}" name="fullname" class="form-control">
                                        @error('fullname')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="">Contact no.</label>
                                        <input type="text" value="{{old('alt_contact')}}" name="alt_contact" class="form-control">
                                        @error('alt_contact')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="">Landmark<span class="text-danger">*</span></label>
                                        <input type="text" value="{{old('landmark')}}" name="landmark" class="form-control">
                                        @error('landmark')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <label for="">Street Name<span class="text-danger">*</span></label>
                                        <input type="text" value="{{old('street_name')}}" name="street_name" class="form-control">
                                        @error('street_name')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="">Area<span class="text-danger">*</span></label>
                                        <input type="text" value="{{old('area')}}" name="area" class="form-control">
                                        @error('area')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="">Pincode<span class="text-danger">*</span></label>
                                        <input type="text" value="{{old('pincode')}}" name="pincode" class="form-control">
                                        @error('pincode')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <label for="">City<span class="text-danger">*</span></label>
                                        <select name="city" value="{{old('city')}}" class="form-select">
                                            <option value="">Select City</option>
                                            <option value="Purnea">Purnea</option>
                                            <option value="Patna">Patna</option>
                                        </select>
                                        @error('city')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="">State<span class="text-danger">*</span></label>
                                        <select name="state" value="{{old('state')}}" class="form-select">
                                            <option value="">Select state</option>
                                            <option value="Bihar">Bihar</option>
                                            <option value="West Bengal">West Bengal</option>
                                        </select>
                                        @error('state')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="">Type<span class="text-danger">*</span></label>
                                        <br>
                                        <input type="radio" name="type" value="h" checked>Home
                                        <input type="radio" name="type" value="o">Office
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="submit" value="Save New Address" class="btn  btn-success btn-center btn-lg w-50">
                            </div>
                        </form>
                </div>

            </div>
        </div>

            <div class="col-4 ms-5">
                <h2>Saved Address</h2>
            
                <form action="{{route('pay.now')}}" method="post">
                    @csrf

                    <input type="text" name="amount" value={{session('amount')}}>
                    @foreach ($addresses as $add)
                        
                    <div class="grid mb-2 mt-3">
                        <div class="card">
                            <div class="card-body">

                                <!-- Address Cards -->

                                <label><span class="fw-bold "><input name="address_id" class="radio" type="radio" value="{{$add->id}}" checked>
                                <?=($add['type'] == "o")? "Office" : (($add['type'] == "h")? "Home" : "Other");?></span> <br>
                                <span class="fw-bold">Name: </span> {{$add->fullname}}
                                <br>
                                <span class="fw-bold">Contact no. </span> {{$add->alt_contact}} <br>
                                <span class="fw-bold">Address: </span>
                                <span class="text-capitalize">
                                {{$add->street_name}},{{$add->landmark}},{{$add->area}},{{$add->city}}</span><br>
                                <span class="fw-bold">Pincode: </span> {{$add->pincode}} <br><span class="fw-bold">City: </span>{{$add->city}} <br><span class="fw-bold">State: </span>{{$add->state}}
                                </label>
                            </div>
                        </div>
                    </div>
                    @endforeach 
                    <div class="d-flex justify-content-between gap-3 mt-3">
                        <a href="{{route('cart')}}"class="btn btn-dark btn-lg">Go Back</a>
                        <input type="submit" class="btn btn-lg btn-primary" value="Proceed To Payment">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection