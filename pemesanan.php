<?php
$title = "Kamera DSLR - Pemesanan";
include('header.php');

// Get the product name from the query string
$produk = isset($_GET['produk']) ? htmlspecialchars($_GET['produk']) : 'Produk tidak ditemukan';
?>

<div class="container mt-5" id="orderFormContainer">
    <h2 class="text-center mb-4">Halaman Pemesanan</h2>
    
    <form id="orderForm">
        <h4>Form Data Pembeli:</h4>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" placeholder="Masukkan nama lengkap" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Masukkan alamat email" required>
        </div>
        <div class="form-group">
            <label for="telepon">Nomor Telepon</label>
            <input type="tel" class="form-control" id="telepon" placeholder="Masukkan nomor telepon" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat Lengkap</label>
            <textarea class="form-control" id="alamat" rows="2" placeholder="Masukkan alamat lengkap" required></textarea>
        </div>

        <h4>Ringkasan Pesanan:</h4>
        <div class="form-group">
            <label for="produk">Produk</label>
            <input type="text" class="form-control" id="produk" value="<?php echo $produk; ?>" readonly>
        </div>

        <h4>Pilihan Metode Pembayaran:</h4>
        <div class="form-group">
            <label for="metode">Pilih Metode Pembayaran</label>
            <select class="form-control" id="metode" required>
                <option value="">Pilih metode pembayaran</option>
                <option value="Kartu Kredit">Kartu Kredit</option>
                <option value="Transfer Bank">Transfer Bank</option>
                <option value="Bayar di Tempat">Bayar di Tempat</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Proses Pesanan</button>
    </form>
</div>

<div class="container mt-5" id="confirmationMessage" style="display:none;">
    <h2 class="text-center">Pesanan Anda Telah Diterima!</h2>
    <p class="text-center">Terima kasih telah melakukan pemesanan. Kami akan segera memprosesnya.</p>
</div>

<script>
    document.getElementById('orderForm').onsubmit = function(event) {
        event.preventDefault(); // Mencegah pengiriman form yang default

        // Sembunyikan form pemesanan
        document.getElementById('orderFormContainer').style.display = 'none';

        // Tampilkan pesan konfirmasi
        document.getElementById('confirmationMessage').style.display = 'block';
    };
</script>

<?php include('footer.php'); ?>
