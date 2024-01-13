@extends('admin.adminBase')

@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-8"></div>
            <div class="col-4">
                <div class="row">
                    <div class="col-6">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <h3 class="display-3">{{$categories}}+</h3>
                                <h5>Total Categories</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <h3 class="display-3">{{$products}}+</h3>
                                <h5>Total Dishes</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mt-4">
                        <div class="card bg-warning text-white">
                            <div class="card-body">
                                <h3 class="display-3">40+</h3>
                                <h5>Happy Customers</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mt-4">
                        <div class="card bg-danger text-white">
                            <div class="card-body">
                                <h3 class="display-3">40+</h3>
                                <h5>Total Orders</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection