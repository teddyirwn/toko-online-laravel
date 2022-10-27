@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4>order History
                            <a href="{{ route('orders-web') }} " class="btn btn-warning float-end">BACK</a>
                        </h4>
                    </div>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> order date</th>
                                <th>Tracking number</th>
                                <th>total price</th>
                                <th>Status </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item)
                                <tr>
                                    <td>{{ date('d-m-Y', strtotime($item->create_at)) }} </td>
                                    <td>{{ $item->tracking_no }} </td>
                                    <td>{{ $item->total_price }} </td>
                                    <td>{{ $item->status == '0' ? 'panding' : 'completed' }} </td>
                                    <td>
                                        <a href="{{ route('admin.order.view', $item->id) }} " class="btn btn-primary">view</a>

                                    </td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
