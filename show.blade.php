@extends('layouts.app')

@section('title', 'Show Order')

@section('content')
<div class="content-wrapper">
    <div class="row mb-3">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Detail Order</h4>
                    <hr />
                    <div class="text-center mb-3">
                        @if ($order->image)
                        <img src="{{ asset('storage/' . $order->image) }}" alt="{{ $order->title }}" style="width: 150px; height: auto;">
                        @else
                        <span>No Image</span>
                        @endif
                    </div>
                    <div class="row mb-3">
                        <div class="col mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $order->title }}" readonly>
                        </div>
                        <div class="col mb-3">
                            <label class="form-label">Price</label>
                            <input type="text" name="price" class="form-control" placeholder="Price" value="{{ $order->price }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col mb-3">
                            <label class="form-label">Order Code</label>
                            <input type="text" name="order_code" class="form-control" placeholder="Order Code" value="{{ $order->order_code }}" readonly>
                        </div>
                        <div class="col mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" placeholder="Description" readonly>{{ $order->description }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col mb-3">
                            <label class="form-label">Created At</label>
                            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $order->created_at }}" readonly>
                        </div>
                        <div class="col mb-3">
                            <label class="form-label">Updated At</label>
                            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $order->updated_at }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection