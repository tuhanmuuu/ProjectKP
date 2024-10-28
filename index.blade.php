@extends('layouts.app')

@section('title', 'Order List')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">List Order</h4>
                    <p class="card-description">
                        Add class <code>.table</code>
                    </p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <a href="{{ route('orders.create') }}" class="btn">
                                            <i class="mdi mdi-border-color"></i>
                                        </a>
                                    </th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Order Code</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($order->count() > 0)
                                @foreach($order as $rs)
                                <tr>
                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                    <td class="align-middle">
                                        @if($rs->image)
                                        <img src="{{ asset('storage/' . $rs->image) }}" alt="{{ $rs->title }}" style="width: 50px; height: auto;">
                                        @else
                                        <span>No Image</span>
                                        @endif
                                    </td>
                                    <td class="align-middle">{{ $rs->title }}</td>
                                    <td class="align-middle">${{ number_format($rs->price, 2) }}</td>
                                    <td class="align-middle">{{ $rs->order_code }}</td>
                                    <td class="align-middle">{{ $rs->description }}</td>
                                    <td class="align-middle">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('orders.show', $rs->id) }}" class="btn btn-secondary">Detail</a>
                                            <a href="{{ route('orders.edit', $rs->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('orders.destroy', $rs->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td class="text-center" colspan="7">Order not found</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection