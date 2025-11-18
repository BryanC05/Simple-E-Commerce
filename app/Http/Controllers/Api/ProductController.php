<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    // GET: Ambil semua produk
    public function index()
    {
        return response()->json(Product::all());
    }

    // POST: Tambah produk baru
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'price' => 'required|integer',
            'stock' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Simpan ke database
        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    // GET: Lihat 1 produk
    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        return response()->json($product);
    }

    // PUT: Update produk
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) return response()->json(['message' => 'Produk tidak ditemukan'], 404);

        $product->update($request->all());
        return response()->json($product);
    }

    // DELETE: Hapus produk
    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        
        $product->delete();
        return response()->json(['message' => 'Produk berhasil dihapus']);
    }
}