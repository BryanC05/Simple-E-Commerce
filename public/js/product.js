//  Inisialisasi DataTables dan handle modal
$(document).ready(function () {
    // Aktifkan DataTables pada tabel dengan ID #productTable
    $('#productTable').DataTable();
});

// Fungsi Dummy untuk tombol Simpan [cite: 47]
function saveProduct() {
    // Ambil nilai input
    let name = $('#name').val();
    let price = $('#price').val();
    let stock = $('#stock').val();

    if(name == "" || price == "" || stock == "") {
        alert("Semua kolom harus diisi!");
        return;
    }

    // Tampilkan alert sukses (karena hanya dummy)
    alert("Simulasi: Produk '" + name + "' berhasil disimpan!");
    
    // Tutup modal
    $('#addProductModal').modal('hide');
    
    // Reset form
    document.getElementById('productForm').reset();
}