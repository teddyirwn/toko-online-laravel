@extends('layouts.app')

@section('content')
    <div class="container mt-5 py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>My order</h4>
                    </div>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Tracking number</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item)
                                <tr>
                                    <td>{{ $item->tracking_no }} </td>
                                    <td>{{ $item->total_price }} </td>
                                    <td>{{ $item->status == '0' ? 'panding' : 'completed' }} </td>
                                    <td>
                                        <a href="{{ route('order-view', $item->id) }} " class="btn btn-primary">view</a>

                                    </td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    @endsection
