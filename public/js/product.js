$(document).ready(function () {
    $('#productTable').DataTable();
});

function saveProduct() {
    let name = $('#name').val();
    let price = $('#price').val();
    let stock = $('#stock').val();

    if(name == "" || price == "" || stock == "") {
        alert("Semua kolom harus diisi!");
        return;
    }

    alert("Simulasi: Produk '" + name + "' berhasil disimpan!");
    
    $('#addProductModal').modal('hide');
    
    document.getElementById('productForm').reset();
}