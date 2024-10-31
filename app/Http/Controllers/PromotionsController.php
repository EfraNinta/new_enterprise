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
        return response()->json($promotions); // Mengembalikan data promosi dalam format JSON
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
        $promotion = Promotion::create($validatedData);
        return response()->json($promotion, 201); // Mengembalikan data promosi yang baru dibuat
    }

    // Menampilkan promosi berdasarkan ID
    public function show($id)
    {
        // Mencari promosi berdasarkan ID
        $promotion = Promotion::findOrFail($id); // Jika tidak ditemukan, akan mengembalikan 404
        return response()->json($promotion);
    }

    // Memperbarui promosi yang ada
    public function update(Request $request, $id)
    {
        // Mencari promosi berdasarkan ID
        $promotion = Promotion::findOrFail($id);

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
        return response()->json($promotion); // Mengembalikan data promosi yang telah diperbarui
    }

    // Menghapus promosi berdasarkan ID
    public function destroy($id)
    {
        // Mencari promosi berdasarkan ID
        $promotion = Promotion::findOrFail($id);
        $promotion->delete(); // Menghapus promosi dari database
        return response()->json(null, 204); // Mengembalikan respons tanpa konten (204 No Content)
    }
}
