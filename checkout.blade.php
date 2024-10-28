@extends('front')

@section('title', 'Checkout')

@section('content')
@php
$hideSlider = true;
@endphp

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card" style="background-color: #212121;">
                <div class="container">
                    <div class="heading_container heading_center">
                        <h2 style="color: #1db954; margin-top: 40px;">
                            Checkout <span style="color: #FAFAFA;">Details</span>
                        </h2>
                    </div>

                    <!-- Display success or error message -->
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                    <!-- Cart Table for review -->
                    <div class="table-responsive" style="margin-top: 40px; margin-bottom:40px;">
                        <table class="table table-striped" style="color:#FAFAFA; background-color:#121212;">
                            <thead style="background-color: #1db945;">
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $total = 0;
                                @endphp

                                @forelse($cart as $item)
                                @php
                                $total += $item['price']; // Menambahkan harga produk ke total
                                @endphp

                                <tr>
                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                    <td class="align-middle">
                                        @if(isset($item['options']['image']))
                                        <img src="{{ asset('storage/' . $item['options']['image']) }}" alt="{{ $item['name'] }}" style="width: 50px; height: auto;">
                                        @else
                                        <span>No Image</span>
                                        @endif
                                    </td>
                                    <td class="align-middle">{{ $item['name'] }}</td>
                                    <td class="align-middle">${{ number_format($item['price'], 2) }}</td>
                                    <td class="align-middle">1</td> <!-- Set quantity to 1 since you removed qty -->
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">Your cart is empty</td>
                                </tr>
                                @endforelse

                                <!-- Tampilkan total amount di baris terakhir tabel -->
                                <tr>
                                    <td colspan="4" class="text-right" style="font-weight: bold;">Total:</td>
                                    <td class="text-center" style="font-weight: bold;">${{ number_format($total, 2) }}</td>
                                </tr>

                                <!-- Form untuk metode pembayaran -->
                                <tr>
                                    <td class="align-middle" colspan="4">Payment Method</td>
                                    <td class="align-middle">
                                        <form action="{{ route('checkout.submit') }}" method="POST">
                                            @csrf
                                            <select class="form-control" id="payment_method" name="payment_method" required>
                                                <option value="cod" selected>Cash on Delivery (COD)</option>
                                            </select>
                                        </form>
                                    </td>
                                </tr>

                            </tbody>
                        </table>


                    </div>


                    <!-- Checkout Form -->
                    <div class="container" style="margin-top: 20px; margin-bottom: 40px;">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <form action="{{ route('checkout.submit') }}" method="POST" style="text-align: center;">
                                    @csrf
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-lg">Place Order</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection