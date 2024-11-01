<?php

namespace App\Http\Controllers;

use App\Models\Promotion; // Mengimpor model Promotion
use Illuminate\Http\Request;

class PromotionsController extends Controller
{
    // Menampilkan semua promosi
    public function index()
    {
        $promotions = Promotion::all(); // Mengambil semua data promosi dari database
        return view('promotions.index', compact('promotions')); // Mengembalikan tampilan dengan data promosi
    }

    // Menyimpan promosi baru
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'discount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        // Membuat promosi baru di database
        Promotion::create($validatedData);
        return redirect()->route('promotions.index')->with('success', 'Promosi berhasil ditambahkan.'); // Redirect dengan pesan sukses
    }

    // Menampilkan promosi berdasarkan ID
    public function show($id)
    {
        $promotion = Promotion::findOrFail($id); // Mencari promosi berdasarkan ID
        return view('promotions.show', compact('promotion')); // Mengembalikan tampilan dengan data promosi
    }

    // Memperbarui promosi yang ada
    public function update(Request $request, $id)
    {
        $promotion = Promotion::findOrFail($id); // Mencari promosi berdasarkan ID

        // Validasi data yang diterima
        $validatedData = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'discount' => 'sometimes|required|numeric',
            'start_date' => 'sometimes|required|date',
            'end_date' => 'sometimes|required|date|after:start_date',
        ]);

        // Memperbarui data promosi di database
        $promotion->update($validatedData);
        return redirect()->route('promotions.index')->with('success', 'Promosi berhasil diperbarui.'); // Redirect dengan pesan sukses
    }

    // Menghapus promosi berdasarkan ID
    public function destroy($id)
    {
        $promotion = Promotion::findOrFail($id); // Mencari promosi berdasarkan ID
        $promotion->delete(); // Menghapus promosi dari database
        return redirect()->route('promotions.index')->with('success', 'Promosi berhasil dihapus.'); // Redirect dengan pesan sukses
    }
}
