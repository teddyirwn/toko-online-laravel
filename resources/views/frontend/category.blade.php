@extends('layouts.app')

@section('content')
    <div class="container py-5 mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2>All Category</h2>
                <div class="row ">
                    @foreach ($category as $cate)
                        <div class="col-md-3 mt-4 ">
                            <a href="{{ url('view-category/' . $cate->slug) }}">
                                <div class="card">
                                    <img src="{{ asset('assets/uplouds/category/' . $cate->image) }}" height="230px"
                                        alt=" product image">

                                    <div class="card-body text-center">

                                        <h5>{{ $cate->name }} </h5>
                                        <p>
                                            {{ $cate->description }}
                                        </p>

                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
