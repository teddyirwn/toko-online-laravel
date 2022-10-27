@extends('layouts.app')

@section('content')
    <div class="container mt-5 py-5">
        <form action="{{ route('place-order') }} " method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Detail product</h6>
                            <hr />
                            <div class="row checkout-form">
                                <div class="col-md-6">
                                    <label for="firstname"> First Name</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->name }} "
                                        name="first_name" placeholder="Enter your firstname">
                                </div>
                                <div class="col-md-6">
                                    <label for="lastname"> Last Name</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->last_name }} "
                                        name="last_name" placeholder="Enter your lastname">
                                </div>
                                <div class="col-md-6">
                                    <label for="email"> Email</label>
                                    <input type="email" class="form-control" value="{{ Auth::user()->email }} "
                                        name="email" placeholder="Enter your email">
                                </div>
                                <div class="col-md-6">
                                    <label for="phone"> Phone</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->phone }} "
                                        name="phone" placeholder="Enter your phone">
                                </div>
                                <div class="col-md-6">
                                    <label for="Address1">Address 1 </label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->address1 }} "
                                        name="address1" placeholder="Enter your Address1">
                                </div>
                                <div class="col-md-6">
                                    <label for="Address2"> Address 2</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->address2 }} "
                                        name="address2" placeholder="Enter your Address2">
                                </div>
                                <div class="col-md-6">
                                    <label for="Address2"> City</label>
                                    <input type="text" class="form-control"
                                        value="{{ Auth::user()->city }} "name="city" placeholder="Enter your Address2">
                                </div>
                                <div class="col-md-6">
                                    <label for="Address2">State</label>
                                    <input type="text" class="form-control"value="{{ Auth::user()->state }} "
                                        name="state" placeholder="Enter your Address2">
                                </div>
                                <div class="col-md-6">
                                    <label for="Address2"> Country</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->country }} "
                                        name="country" placeholder="Enter your Address2">
                                </div>
                                <div class="col-md-6">
                                    <label for="Address2"> pincode</label>
                                    <input type="text" class="form-control"
                                        value="{{ Auth::user()->pincode }} "name="pincode"
                                        placeholder="Enter your Address2">
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h6> Order detail</h6>
                            <hr>

                            <table class="table table-striped bg-#F8F8FF">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                @foreach ($cartItems as $item)
                                    <tbody>
                                        <tr>
                                            <td>{{ $item->products->name }} </td>
                                            <td>{{ $item->prod_qty }} </td>
                                            <td>{{ $item->products->selling_price }} </td>
                                        </tr>
                                    </tbody>
                                @endforeach

                            </table>
                            <button type="submit" class="form-control btn btn-success">Order | COD</button>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
