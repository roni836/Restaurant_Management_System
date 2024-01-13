@extends('admin.adminBase')

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-12">
                <h2 class="display-6 float-start fw-bold mb-2">Manage cart ({{ count($totalCarts) }})</h2>
            </div>
            <div class="row">
                <div class="col-12">
                    @foreach ($carts as $item)
                        <div class="card mt-4">
                            <div class="card-header p-1 bg-warning">
                                <table class="table table-sm text-black">
                                    <tr>
                                        <th>Order Number:</th>
                                        <td>{{ $item->id }}</td>
                                        <th>Order By:</th>
                                        <td>{{ $item->users->name}}</td>
                                        <th>Contact:</th>
                                        <td>{{$item->users->contact}}</td>
                                        <th>Email:</th>
                                        <td>{{$item->users->email}}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="card-body mt-0 bg-secondary ">
                                <table class="table table-sm text-white">
                                    <tr>
                                        <th>Id</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Image</th>
                                    </tr>
                                    @foreach ($item->orderItem as $data)
                                        <tr>
                                            <td>{{ $data->id }}</td>
                                            <td>{{ $data->product->title }}</td>
                                            <td>{{ $data->qty }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $data->product->image) }}" width="50px"
                                                    height="50px" alt="">
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    @endforeach
                </div>
                     {{-- Paginator Link  --}}
                     {{$carts->links()}}  
            </div>
        </div>
    </div>
@endsection
