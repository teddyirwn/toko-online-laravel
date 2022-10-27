@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">

                    <h4>add product
                        <a href="{{ route('admin/product') }}" class="btn btn-primary tetx-white btn-sm float-end ">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="{{ route('update.product', $products->id) }} " method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-mb-6 mb-3">
                                    <label for="">Category</label>
                                    <select class="form-select">
                                        <option value="">{{ $products->category->name }} </option>

                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ $products->name }}"
                                        class="form-control" />
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Slug</label>
                                    <input type="text" name="Slug" value="{{ $products->slug }}"
                                        class="form-control" />
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Small Descrition</label>
                                    <textarea type="text" name="smal_description" class="form-control">{{ $products->smal_description }}</textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Descrition</label>
                                    <textarea type="text" name="description" class="form-control">{{ $products->description }}</textarea>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Original price</label>
                                    <input type="number" name="original_price" value="{{ $products->original_price }}"
                                        class="form-control" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>selling price</label>
                                    <input type="number" name="selling_price" value="{{ $products->selling_price }}"
                                        class="form-control" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>tax</label>
                                    <input type="number" name="tax"
                                        value="{{ $products->tax }}"class="form-control" />
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Quantity</label>
                                    <input type="number" name="qty"
                                        value="{{ $products->qty }}"class="form-control" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Status</label><br>
                                    <input type="checkbox" {{ $products->status == '1' ? 'checked' : '' }}
                                        name="status" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Tranding</label><br>
                                    <input type="checkbox" {{ $products->trending == '1' ? 'checked' : '' }}
                                        name="trending" />
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control" />
                                    <img src="{{ asset('assets/uplouds/products/' . $products->image) }}" width="60px"
                                        height="60px" alt="product image">
                                </div>




                                <div class="col-md-12 mb-3">
                                    <h3>SEO Tags</h3>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Meta title</label>
                                    <textarea type="text" name="meta_title" class="form-control">{{ $products->meta_title }}</textarea>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Meta keyword</label>
                                    <textarea type="text" name="meta_keyword" class="form-control">{{ $products->meta_keyword }}</textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Meta description</label>
                                    <textarea type="text" name="meta_description" class="form-control">{{ $products->meta_keyword }}</textarea>
                                </div>

                                <div class="col-md-12 mb-6">
                                    <button type="submit" class="btn btn-primary float-end">Update</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
