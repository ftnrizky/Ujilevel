@extends('layouts.app') <!-- Sesuaikan dengan layout kamu -->

@section('content')
<div class="container mt-5">
    <h2>Pembayaran</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card p-4">
        <h4>Total Harga: <strong>Rp {{ number_format($totalHarga, 0, ',', '.') }}</strong></h4>

        <div class="mt-4">
            <h5>Tata Cara Pembayaran</h5>
            <p>Silakan lakukan transfer ke rekening di bawah ini:</p>

            <ul>
                <li><strong>Nama Bank:</strong> BNI</li>
                <li><strong>Nomor Rekening:</strong> 1234567890</li>
                <li><strong>Atas Nama:</strong> PT Contoh Pembayaran</li>
            </ul>

            <p>Setelah melakukan pembayaran, silakan upload bukti pembayaran di bawah ini.</p>
        </div>

        <form action="{{ route('pembayaran.selesai') }}" method="POST" enctype="multipart/form-data" class="mt-4">
            @csrf

            <div class="form-group">
                <label for="bukti_pembayaran">Upload Bukti Pembayaran</label>
                <input type="file" class="form-control" name="bukti_pembayaran" id="bukti_pembayaran" required>
            </div>

            <button type="submit" class="btn btn-success mt-3">Selesai</button>
        </form>
    </div>
</div>
@endsection
