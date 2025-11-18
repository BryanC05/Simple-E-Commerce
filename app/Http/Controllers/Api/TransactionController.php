<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validasi input
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // 2. Ambil data produk
        $product = Product::find($request->product_id);

        // 3. Cek apakah stok cukup [Soal: Validasi stok harus mencukupi]
        if ($product->stock < $request->quantity) {
            return response()->json(['message' => 'Stok barang tidak mencukupi'], 422);
        }

        // 4. Hitung total harga [Soal: Total harga = quantity x price]
        $totalPrice = $product->price * $request->quantity;

        // 5. Kurangi stok produk [Soal: Stok otomatis berkurang]
        $product->stock = $product->stock - $request->quantity;
        $product->save();

        // 6. Simpan transaksi
        $transaction = Transaction::create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
        ]);

        return response()->json([
            'message' => 'Transaksi berhasil',
            'data' => $transaction
        ], 201);
    }
}