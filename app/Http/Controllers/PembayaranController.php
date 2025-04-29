<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $totalHarga = 500000; // contoh, biasanya ambil dari session atau cart
        return view('frontend.pages.pembayaran', compact('totalHarga'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $bukti = $request->file('bukti_pembayaran')->store('bukti-pembayaran', 'public');

        // Disini kamu bisa simpan ke database kalau mau

        return redirect()->back()->with('success', 'Pembayaran berhasil! Bukti telah dikirim.');
    }
}

