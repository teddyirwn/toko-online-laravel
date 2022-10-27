@extends('layouts.app')



@section('content')
    <div class="container mt-5 py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Order view
                            <a href="{{ route('order-product') }} " class="btn btn-primary float-end"> BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 order-details">
                                <h4>shiping details</h4>
                                <hr>
                                <label for="">Firs name</label>
                                <div class="border ">{{ $orders->first_name }} </div>
                                <label for="">Last name</label>
                                <div class="border   ">{{ $orders->last_name }} </div>
                                <label for=""> Email</label>
                                <div class="border  ">{{ $orders->email }} </div>
                                <label for="">Contact no</label>
                                <div class="border  ">{{ $orders->phone }} </div>
                                <label for="">Shipping Address</label>
                                <div class="border  ">
                                    {{ $orders->address1 }},<br />
                                    {{ $orders->address2 }},<br />
                                    {{ $orders->city }},<br />
                                    {{ $orders->state }},<br />
                                    {{ $orders->country }},
                                </div>
                                <label for=""> Zip code</label>
                                <div class="border  ">{{ $orders->pincode }} </div>
                            </div>
                            <div class="col-md-6">
                                <h4>Order details</h4>
                                <hr>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th> Name</th>
                                            <th> Quantity</th>
                                            <th>price</th>
                                            <th>image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders->orderitems as $item)
                                            <tr>
                                                <td>{{ $item->products->name }} </td>
                                                <td class="text-center">{{ $item->qty }} </td>
                                                <td>{{ $item->price }} </td>
                                                <td>
                                                    <img src="{{ asset('assets/uplouds/products/' . $item->products->image) }} "
                                                        width="50px" alt="image here">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h5>Total :{{ $orders->total_price }} </h5>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
