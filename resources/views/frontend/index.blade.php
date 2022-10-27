@extends('layouts.app')

@section('content')
    @include('layouts.frontend.slide')


    <div class="container">
        <div class="py-5">
            <div class="row">
                <h2>Featured products</h2>
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach ($featured_products as $prod)
                        <div class=" item">
                            <div class="card">
                                <img src="{{ asset('assets/uplouds/products/' . $prod->image) }} " width="150px"
                                    height="250px" alt=" product image">

                                <div class="card-body">
                                    <h5>{{ $prod->name }} </h5>
                                    <span class="float-start"> IDR : {{ $prod->selling_price }} </span>
                                    <span class="float-end"> IDR : <s>{{ $prod->original_price }} </s> </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

        </div>
    </div>
    <div class="container">
        <div class="py-5">
            <div class="row">
                <h2> Trending Category</h2>
                <div class="owl-carousel featured-carousel owl-theme">

                    @foreach ($trending_category as $tcategory)
                        <a href="{{ url('view-category', $tcategory->slug) }}">
                            <div class=" item">
                                <div class="card text-center">
                                    <img src="{{ asset('assets/uplouds/category/' . $tcategory->image) }} "
                                        alt=" product image" height="250px">
                                    <div class="card-body">
                                        <h5>{{ $tcategory->name }} </h5>
                                        <p>
                                            <small> {{ $tcategory->description }}</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>

            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.featured-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
    </script>
@endsection
