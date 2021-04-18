@extends('admin.layouts.master')

@section('page-content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Order List</h3>
            </div>
            @if (session()->has('success'))
                <div class="alert text-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert text-danger">
                    {{ session()->get('error') }}
                </div>
            @endif
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Order Image</th>
                            <th>Product Name</th>
                            <th>Product Quantity</th>
                            <th>Total Price</th>
                            <th>Customer Name</th>
                            <th>Address</th>
                            <th>Mobile No</th>
                            <th>Deliver Status</th>
                            <th>Deliver</th>
                            <th>Delete</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td><img width="60" src="{{ asset($item->image) }}" alt=""></td>
                                <td>{{ $item->product_name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->total }}</td>
                                <td>{{ $item->customer_name }}</td>
                                <td>{{ $item->customer_address }}</td>
                                <td>{{ $item->customer_mobile_no }}</td>
                                <td>{{ $item->is_deliver == false ? 'Not Deviver':'Dvlivered' }}</td>
                                <td>
                                    <a href="{{ route('orders.show',$item->id) }}" class="btn btn-sm {{ $item->is_deliver == false ? 'btn-danger':'btn-success' }} ">{{ $item->is_deliver == false ? 'Not Deviver':'Dvlivered' }}</a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection
