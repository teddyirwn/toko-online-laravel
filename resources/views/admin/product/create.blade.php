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
                        <form action="{{ route('admin/product') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-mb-6 mb-3">
                                    <select class="form-select" name="cate_id">
                                        <option value=""> select a category</option>
                                        @foreach ($category as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach

                                    </select>
                                    @error('cate_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Name Product</label>
                                    <input type="text" name="name" class="form-control" />
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Slug</label>
                                    <input type="text" name="Slug" class="form-control" />
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Small Descrition</label>
                                    <textarea type="text" name="smal_description" class="form-control"></textarea>
                                    @error('smal_description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Descrition</label>
                                    <textarea type="text" name="description" class="form-control"></textarea>
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <div class="col-md-6 mb-3">
                                    <label>Original price</label>
                                    <input type="number" name="original_price" class="form-control" />
                                    @error('original_price')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>selling price</label>
                                    <input type="number" name="selling_price" class="form-control" />
                                    @error('selling_price')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>tax</label>
                                    <input type="number" name="tax" class="form-control" />
                                    @error('tax')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Quantity</label>
                                    <input type="number" name="qty" class="form-control" />
                                    @error('qty')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Status</label><br>
                                    <input type="checkbox" name="status" />

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Trending</label><br>
                                    <input type="checkbox" name="trending" />
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control" />
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>




                                <div class="col-md-12 mb-3">
                                    <h3>SEO Tags</h3>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Meta title</label>
                                    <textarea type="text" name="meta_title" class="form-control"></textarea>
                                    @error('meta_title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Meta keyword</label>
                                    <textarea type="text" name="meta_keyword" class="form-control"></textarea>
                                    @error('meta_keyword')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Meta description</label>
                                    <textarea type="text" name="meta_description" class="form-control"></textarea>
                                    @error('meta_description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-6">
                                    <button type="submit" class="btn btn-primary float-end">Save</button>
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
