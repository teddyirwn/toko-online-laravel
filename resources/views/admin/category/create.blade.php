@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">

                    <h4>add category
                        <a href="{{ url('tcategory') }}" class="btn btn-primary tetx-white btn-sm float-end ">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">

                        <form action="{{ route('category.store') }} " method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Name</label>
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
                                    <label>Descrition</label>
                                    <textarea type="text" name="description" class="form-control"></textarea>
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control" />
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Status</label><br>
                                    <input type="checkbox" name="status" />
                                    @error('status')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>popular</label><br>
                                    <input type="checkbox" name="popular" />
                                    @error('popular')
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
