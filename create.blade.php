@extends('layouts.app')

@section('title', 'Create Order')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Order</h4>
                    <p class="card-description">
                        Fill out the form to add a new order
                    </p>
                    <form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Order Title" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="4" placeholder="Order Description" required></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="order_code">Order Code</label>
                            <input type="text" class="form-control" name="order_code" id="order_code" placeholder="Enter order code" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" name="price" id="price" placeholder="Enter order price" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="image">Image</label>
                            <input type="file" class="form-control file-upload-info" name="image" id="image" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection