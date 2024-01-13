@extends('home.base')

@section('content')
    
    <div class="container">
     @if ($order)
     <div class="row ">
        <div class="col-12 mb-4">
            <h2>My Orders ({{$count = count($order->orderItem)}})</h2>
        </div>

        @if ($countItem)
            
        <div class="col-7">
           <div class="card">
                <div class="card-header">
                   <span>Order Id: {{$payment->ORDERID}}</span> 
                   <span class="float-end">
                    Total Amount : {{$payment->TXNAMOUNT}}
                   </span>
                </div>
                <div class="card-body">
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
                                        <span>Qty : {{$item->qty}} </span>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="card-footer">
                    <span class="small">Ordered At : {{date("D-d-M-Y h:i:s A",strtotime($order->updated_at))}}</span>
                </div>
           </div>

        </div>
        
        @else
        <h1 class="text-secondary fw-bold text-center">Oops Your Cart is Empty !</h1>
        <a href="{{route("home.index")}}" class="btn btn-lg btn-dark w-25 mt-5 mx-auto">Shop Now</a>

        @endif

    </div>
         
     @else
         <div class="card text-center">
            <div class="card-body ">
                <h1 class="text-secondary">
                    No Order Found
                </h1>
                <a href="{{route('home.index')}}" class="btn btn-warning">Start Tasting Now</a>
            </div>
         </div>
     @endif
    </div>

@endsection