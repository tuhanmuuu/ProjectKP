@extends('layouts.app')

@section('title', 'Edit Order')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Order</h4>
                    <p class="card-description">
                        Fill out the form to edit the existing order
                    </p>
                    <form action="{{ route('orders.update', $order->id) }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Order Title" value="{{ $order->title }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="4" placeholder="Order Description" required>{{ $order->description }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="order_code">Order Code</label>
                            <input type="text" name="product_code" class="form-control" id="order_code" placeholder="Enter order code" value="{{ $order->product_code }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="price">Price</label>
                            <input type="number" name="price" class="form-control" id="price" placeholder="Enter order price" value="{{ $order->price }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" name="image" id="image">
                            @if($order->image)
                            <div class="mt-2">
                                <img src="{{ asset($order->image) }}" alt="Current Order Image" style="width: 100px; height: auto;">
                            </div>
                            @endif
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-warning">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection