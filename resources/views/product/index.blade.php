@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Daftar Produk</h4>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addProductModal">
            + Tambah Produk
        </button>
    </div>
    <div class="card-body">
        <table id="productTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th> <th>Harga</th>       <th>Stok</th>        <th>Dibuat Pada</th> </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->created_at->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="addProductModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Produk Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="productForm">
                    <div class="mb-3">
                        <label class="form-label">Nama Produk</label> <input type="text" class="form-control" id="name" placeholder="Contoh: Mouse Wireless">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga</label> <input type="number" class="form-control" id="price" placeholder="0">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stok</label> <input type="number" class="form-control" id="stock" placeholder="0">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button> <button type="button" class="btn btn-primary" onclick="saveProduct()">Simpan</button> </div>
        </div>
    </div>
</div>
@endsection