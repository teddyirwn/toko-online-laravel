@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-10   ">

            <div class="card">
                <div class="card-header">
                    <h4>product
                        <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm float-end ">add
                            product</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>id </th>
                                <th>Category </th>
                                <th>name </th>
                                <th>selling price</th>
                                <th>image </th>
                                <th>action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->category->name }}</td>
                                    <td>{{ $item->name }}</td>

                                    <td>{{ $item->selling_price }}</td>
                                    <td>
                                        <img src="{{ asset('assets/uplouds/products/' . $item->image) }}"class="cate-image"
                                            alt="image here">
                                    </td>
                                    <td>

                                        <a href="{{ route('product.edit', $item->id) }}" class="btn btn-primary ">edit</a>
                                        <a href="{{ route('product.delete', $item->id) }}" class="btn btn-danger btn-sm"
                                            onclick="return confirm(` Yakin INGIN MENGHAPUS PRODUCT INI ?`);"
                                            title="Delete">
                                            <i class="fa fa-times"></i>
                                            Delete
                                        </a>


                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $products->links() }} --}}
                </div>
            </div>
        </div>
    </div>
@endsection
