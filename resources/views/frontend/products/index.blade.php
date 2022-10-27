@extends('layouts.app')

@section('content')
    <div class="mt-5 py-2">
        <div class=" mb-4 shadow-sm bg-light  norder-top">
            <div class="container  py-4">
                <h5 class="mb-0"> Collections /
                    <a href=" "></a>

                    <a href="">{{ $category->name }}</a>

                </h5>
            </div>
        </div>
    </div>


    <div class="container">
        <div class=" shodaw-sm">
            <div class="row">
                <h2>{{ $category->name }} </h2>
                @foreach ($products as $prod)
                    <div class=" col-md-3 mb-3">
                        <a href="{{ url('category/' . $category->slug . '/' . $prod->slug) }}">
                            <div class="card">
                                <img src="{{ asset('assets/uplouds/products/' . $prod->image) }} " alt=" product image">
                                <div class="card-body">


                                    <h5>{{ $prod->name }} </h5>

                                    <span class="float-start"> IDR : {{ $prod->selling_price }} </span>
                                    <span class="float-end"> <s> IDR : {{ $prod->original_price }} </s> </span>

                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
