@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-10">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">

                    <h4>edit category
                        <a href="{{ route('admin/category') }}" class="btn btn-primary tetx-white btn-sm float-end ">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="{{ route('update.category', $category->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ $category->name }}"
                                        class="form-control" />
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Slug</label>
                                    <input type="text" name="Slug" value="{{ $category->slug }}"
                                        class="form-control" />
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Descrition</label>
                                    <textarea type="text" name="description" class="form-control">{{ $category->description }}</textarea>
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control" />
                                    <img src="{{ asset('assets/uplouds/category/' . $category->image) }}" width="60px"
                                        height="60px" alt="category image">
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Status</label><br>
                                    <input type="checkbox" name="status"
                                        {{ $category->status == '1' ? 'checked' : '' }} />

                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>popular</label><br>
                                    <input type="checkbox" {{ $category->popular == '1' ? 'checked' : '' }}
                                        name="popular" />
                                </div>


                                <div class="col-md-12 mb-3">
                                    <h3>SEO Tags</h3>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Meta title</label>
                                    <input type="text" name="meta_title" value="{{ $category->meta_title }}"
                                        class="form-control">
                                    @error('meta_title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Meta keyword</label>
                                    <textarea type="text" name="meta_keyword" class="form-control">{{ $category->meta_keyword }}</textarea>
                                    @error('meta_keyword')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Meta description</label>
                                    <textarea type="text" name="meta_description" class="form-control">{{ $category->meta_description }}</textarea>
                                    @error('meta_description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
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
