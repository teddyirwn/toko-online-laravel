@extends('layouts.app')

@section('content')
    <div class="py-5 mb-4 shadow-sm bg-info norder-top"><br /><br />
        <div class="container">
            <h5 class="mb-0">
                Collections / {{ $products->category->name }} / {{ $products->name }}
            </h5>
        </div>

    </div>

    @csrf
    <div class="container">
        <div class="card shodaw-sm product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{ asset('assets/uplouds/products/' . $products->image) }}  " class="w-100" alt="...">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{ $products->name }}
                            @if ($products->trending == '1')
                                <label style="font-size:16px;" class="float-end badge  bg-primary trending tag">Trending
                                </label>
                            @endif
                        </h2>
                        <p class="mt-3">
                            {{ $products->smal_description }}
                        </p>

                        @if ($products->qty > 0)
                            <label class="badge bg-success">in stock</label>
                        @else
                            <label class="badge bg-danger">out off stock</label>
                        @endif
                        <br />
                        <label class="fw-bold">IDR {{ $products->selling_price }}</label>
                        <div class="row mt-1">
                            <div class="col-md-3">
                                <input type="hidden" value="{{ $products->id }}" class="prod_id">
                                <label for="Quattity">Quantity</label>
                                <div class="input-group text-center mb-3" style="width:130px">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity" value="1"
                                        class=" form-control qty-input text-center " />
                                    <button class="input-group-text increment-btn ">+</button>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <br />
                                @if ($products->qty > 0)
                                    <button type="button" class="  btn btn-success  addToCartBtn me-3  float-start">
                                        Masukan ke
                                        keranjang<i class="fa-solid fa-cart-shopping"></i></button>
                                @endif

                            </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="col-md-12">
                    <hr />
                    <h3>description</h3>
                    <p class="mt-3">
                        {!! $products->description !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- @section('scripts')
    <script>
        $(document).ready(function() {





        });
    </script>
@endsection --}}
