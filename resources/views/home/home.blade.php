@extends('home.base')

@section('content')

    
    <div class="container">
        @foreach ($categories as $cat)
            <h2 class="font-bold d-flex row mx-1">{{$cat->cat_title}}</h2>
        <div class="row mt-4">
        @foreach ($cat->products as $item)
        <div class="col-3">
            <div class="card wow mb-3 rounded-0 ">
                <div class="card-body d-flex">
                    <div class="col-4">
                        <img width="80" height="80" src="{{asset("storage/".$item->image)}}" style="object-fit:cover;" alt="">
                    </div>
                    <div class="col-8">
                        <div class="d-flex justify-content-between">
                            <h6 style="height: 30px">{{$item->title}}</h6>

                                @if($item->isVeg)
                                    <img src="{{asset('icons/veg.png')}}" height="30" width="30" alt="">
                                @else
                                    <img src="{{asset('icons/nonVeg.png')}}" height="30" width="30" alt="">
                                @endif
                                
                        </div>                    
                        <h5 class="text-danger">Rs. {{$item->discount_price}} <del class="small text-muted"> Rs.{{$item->price}}</del></h5>
                        <a href="{{route("addToCart",$item->id)}}" class="btn btn-primary rounded-0 w-100 p-0">Buy <span class="bi bi-cart-plus "></span></a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        </div>
        @endforeach

    </div>


@endsection