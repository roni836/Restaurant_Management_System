@extends('admin.adminBase')

@section('content')

    <div class="container">
        <div class="row mt-4">
            <div class="col-12">
                <div class="container">
                    <h2 class="display-6 float-start fw-bold mb-4">Manage Products ({{count($totalProducts)}})</h2>
                <a href="{{route('admin.product.insert')}}" class="btn btn-success float-end">Insert Product</a>
                </div>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>isVeg</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($products as $item)
                               <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->title}}</td>
                                <td>
                                    @if($item->isVeg) <img src="{{asset('icons/veg.png')}}" alt="">
                                    @else <img src="{{asset('icons/nonVeg.png')}}" alt="">
                                    @endif
                                </td>
                                <td>₹ {{$item->discount_price}} <del>₹ {{$item->price}}</del></td>
                                <td><img src="{{asset('storage/'. $item->image)}}"width="80px" height="50px" class="object-fit:cover;" alt=""></td>
                                <td>{{$item->description}}</td>
                                <td>{{$item->status}}</td>
                                <td>{{$item->category->cat_title}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="" class="btn btn-danger">X</a>
                                    </div>
                                </td>

                               </tr>
                               @endforeach
                            </tbody>
                        </table>

                        {{-- Paginator Link  --}}
                        {{$products->links()}}   

                    </div>
                </div>
    </div>

@endsection