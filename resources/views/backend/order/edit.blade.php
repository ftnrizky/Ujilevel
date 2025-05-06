@extends('backend.layouts.master')

@section('title', 'Order Detail')

@section('main-content')
    <div class="card">
        <h5 class="card-header">Order Edit</h5>
        <div class="card-body">
            <form action="{{ route('order.update', $order->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="status">Status :</label>
                    <select name="status" id="" class="form-control">
                        <option value="new"
                            {{ $order->status == 'delivered' || $order->status == 'process' || $order->status == 'cancel' ? 'disabled' : '' }}
                            {{ $order->status == 'new' ? 'selected' : '' }}>New</option>
                        <option value="process"
                            {{ $order->status == 'delivered' || $order->status == 'cancel' ? 'disabled' : '' }}
                            {{ $order->status == 'process' ? 'selected' : '' }}>process</option>
                        <option value="delivered" {{ $order->status == 'cancel' ? 'disabled' : '' }}
                            {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                        <option value="cancel" {{ $order->status == 'delivered' ? 'disabled' : '' }}
                            {{ $order->status == 'cancel' ? 'selected' : '' }}>Cancel</option>
                    </select>
                </div>
                @if ($order->bukti_pembayaran)
                    <div class="form-group">
                        <label>Bukti Pembayaran:</label><br>
                        <a href="{{ asset('storage/' . $order->bukti_pembayaran) }}" target="_blank">
                            <img src="{{ asset('storage/' . $order->bukti_pembayaran) }}" alt="Bukti Pembayaran"
                                style="height:80px; border:1px solid #ccc; border-radius:5px;">
                        </a>
                    </div>
                @endif

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .order-info,
        .shipping-info {
            background: #ECECEC;
            padding: 20px;
        }

        .order-info h4,
        .shipping-info h4 {
            text-decoration: underline;
        }
    </style>
@endpush
