<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        // Validasi data yang masuk dari request
        $validated = $request->validate([
            'size' => 'required|string',
            'custom_image' => 'required|image|max:2048', // Gambar maksimal 2MB
        ]);

        // Simpan gambar yang diunggah ke storage dan dapatkan path-nya
        $imagePath = $request->file('custom_image')->store('custom_images', 'public');

        // Ambil data cart dari session atau buat array baru jika belum ada
        $cart = session()->get('cart', []);

        // Tambahkan produk custom ke dalam cart
        $cart[] = [
            'name' => 'Custom Order',
            'size' => $validated['size'],
            'custom_image' => $imagePath,
        ];

        // Simpan cart yang sudah diperbarui ke dalam session
        session(['cart' => $cart]);

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Custom order added to cart');
    }


    public function index()
    {
        $cart = session('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function remove($id)
    {
        $cart = session('cart', []);

        // Menggunakan array_filter untuk menghapus item dari cart
        $cart = array_filter($cart, function ($item) use ($id) {
            return !isset($item['id']) || $item['id'] != $id;
        });

        // Simpan cart yang sudah diperbarui ke dalam session
        session(['cart' => array_values($cart)]);

        return redirect()->route('front.home')->with('success', 'Product removed from cart');
    }
}
