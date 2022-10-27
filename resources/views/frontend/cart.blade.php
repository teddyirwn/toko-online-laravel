@extends('layouts.app')

@section('content')
    <div class="row bg-light ">
        <div class="col">
            <div class="container py-5 ">
                <div class="text-center ">
                    <br><br /><br />
                    <h1>keranjang</h1>
                </div>
            </div>
        </div>
    </div>


    <div class="container py-5">
        <div class="row">
            @if ($cartItems->count() > 0)
                <div class="col-md-7">
                    <div class="card shodaw-sm " style="max-width: 720px;">
                        <div class="card-body ">
                            @php $total = 0;  @endphp
                            @foreach ($cartItems as $item)
                                <div class="row product_data">
                                    <div class="col-md-2 ">
                                        <img src="{{ asset('assets/uplouds/products/' . $item->products->image) }}  "
                                            height="100px" width="100px" alt="...">
                                    </div>
                                    <div class="col-md-5 my-auto">
                                        <h5> {{ $item->products->name }}</h5>
                                        <span><b>IDR {{ $item->products->selling_price }} </b></span>
                                    </div>
                                    <div class="col-md-12 ">
                                        <input type="hidden" class="prod_id" value="{{ $item->prod_id }} ">
                                        @if ($item->products->qty >= $item->prod_qty)
                                            <div class="input-group text-center mb-3 float-end" style="width:130px">
                                                <button class="input-group-text changeQuatity decrement-btn">-</i></button>
                                                <input type="text" name="quantity"
                                                    class=" form-control qty-input text-center "
                                                    value=" {{ $item->prod_qty }}" />
                                                <button
                                                    class="input-group-text bg-light changeQuatity increment-btn ">+</button>
                                            </div>
                                            @php $total += $item->products->selling_price *  $item->prod_qty;  @endphp
                                        @else
                                            <h6>out of stock</h6>
                                        @endif

                                        <div class="col-md-2 float-end">
                                            <div class="delete">
                                                <button class="btn btn-light delete-cart-item"><i
                                                        class="fa-solid fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <hr>
                            @endforeach
                        </div>

                    </div>

                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h6> shopping Cart</h6>
                            <hr>
                            <table class="table bg-#F8F8FF">
                                <tr>
                                    <th> Total harga : IDR {{ $total }}
                                        <a href="{{ route('checkout-product') }} "
                                            class="btn btn-outline-success float-end">Checkout</a>
                                    </th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            @else
                <div class="card ">
                    <div class="card-body text-center">
                        <h2>your <i class="fa-solid fa-cart-shopping"></i> cart is empety</i></h2>

                        <a href="{{ route('categoryall') }}" class="btn btn-outline-success"> Beli sekarang </a>

                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
