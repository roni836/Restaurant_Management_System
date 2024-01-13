@extends('home.base')

@section('content')
    
    <div class="container">
        @if($order)
        <div class="row ">
            <div class="col-12 mb-4">
                <h2>My Cart ({{$count = count($order->orderItem)}})</h2>
            </div>

            @if ($count)
                
            <div class="col-7">
                @php
                    $total_price = $total_discount = 0;
                    $delivery_charge = 50;
                    $net_payable = 0;
                @endphp
                @foreach ($order->orderItem as $item)
                    
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2">
                                <img src="{{asset('storage/'.$item->product->image)}}"width="80" height="80" style="object-fit:cover;" alt="">
                            </div>
                            <div class="col-10">
                                <h4 class="text-capitalize">{{$item->product->title}}</h4>
                                <div class="container">
                                    <h6>Rs.{{$item->product->discount_price *$item->qty}}/-<del class="text-muted">Rs.{{$item->product->price*$item->qty}}/-</del></h6>
                                </div>                            
                            <div class="col-4 ">
                                <a href="{{route('removeFromCart',$item->product->id)}}" class="btn btn-sm btn-danger">-</a>
                                <span> {{$item->qty}} </span>
                                <a href="{{route("addToCart",$item->product->id)}}" class="btn btn-sm btn-success">+</a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                @php
                    $total_price +=  ($item->product->price *$item->qty);
                    $total_discount +=  ($item->product->discount_price *$item->qty);
                @endphp
                @endforeach

            </div>
            <div class="col-4 ms-5">
                <div class="list-group">

                    <span class="list-group-item list-group-item-action">Total Price
                        <span class="float-end ">Rs.{{$total_price}}</span>
                    </span>
                    <span class="list-group-item list-group-item-action">Discount
                        <span class="float-end fw-bold">Rs.{{$total_price - $total_discount}}</span>
                    </span>
                    <span class="list-group-item list-group-item-action">Tax (GST 18%)
                        <span class="float-end ">Rs.{{$tax = $total_discount *0.18}}</span>
                    </span>
                    @php
                        $net_payable = $total_discount + $tax;
                        $delivery_charge = ($net_payable <= 500)? 50 : 0;
                    @endphp
                    <span class="list-group-item list-group-item-action">Delivery Charge
                        <span class="float-end">
                            @if ($delivery_charge)
                                Rs.{{$delivery_charge}}
                            @else
                            <span class="fw-bold">FREE</span>
                            @endif
                        </span>
                    </span>
                    <span class="list-group-item list-group-item-action h3 fw-bold text-primary">Net Payable <span class="float-end">
                        Rs.{{$totalPayableAmount = $net_payable + $delivery_charge}}
                        @php
                            session()->flash('amount',$totalPayableAmount);
                        @endphp
                    </span></span>
                </div>

                <div class="mt-4 d-flex gap-1">
                    <div class="col">
                        <a href="{{route("home.index")}}" class="btn btn-dark w-100 btn-lg">Add More</a>
                    </div>
                    <div class="col">
                        <a href="{{route('checkout')}}" class="btn btn-warning w-100 btn-lg">Proceed</a>
                    </div>
                </div>                
            </div>
            @endif
            @else
            <h1 class="text-secondary fw-bold text-center">Oops Your Cart is Empty !</h1>
            <a href="{{route("home.index")}}" class="btn btn-lg btn-dark w-25 mt-5 mx-auto">Shop Now</a>

            @endif

        </div>
    </div>

@endsection