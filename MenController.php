<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenProduct;

class MenController extends Controller
{
    public function index()
    {
        // Ambil semua data dari tabel `men_products`
        $mens = MenProduct::all();
        return view('fronts.custom-order.men.index', compact('mens'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'custom_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // maksimal 2MB
            'size' => 'required|string', // Tambahkan validasi untuk ukuran
            'chest' => 'numeric|nullable',
            'hand' => 'numeric|nullable',
        ]);

        // Membuat instance baru untuk MenProduct
        $men = new MenProduct();

        // Simpan gambar jika ada
        if ($request->hasFile('custom_image')) {
            $imagePath = $request->file('custom_image')->store('images', 'public');
            $men->custom_image = $imagePath;
        }

        // Simpan data ukuran dan dimensi
        $men->size = $request->input('size');
        $men->chest = $request->input('chest');
        $men->hand = $request->input('hand');
        $men->save();

        return redirect()->route('custom-product.men.index')->with('success', 'Custom order for Men added successfully');
    }
}
