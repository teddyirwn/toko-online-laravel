@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-10">

            <div class="card">
                <div class="card-header">
                    <h4>category
                        <a href="{{ route('create') }}" class="btn btn-primary btn-sm float-end ">add
                            category</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>id </th>
                                <th>name </th>
                                <th>status</th>
                                <th>image </th>
                                <th>action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>

                                    <td>{{ $item->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                    <td>
                                        <img src="{{ asset('assets/uplouds/category/' . $item->image) }}"class="cate-image"
                                            alt="image here">
                                    </td>
                                    <td>

                                        <a href="{{ route('category.edit', $item->id) }}" class="btn btn-primary ">edit</a>
                                        <a href="{{ route('cdelete', $item->id) }}" class="btn btn-danger btn-sm"
                                            onclick="return confirm(`Data ingin dihapus ?`);" title="Delete">
                                            <i class="fa fa-times"></i>
                                            Delete
                                        </a>

                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $category->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
