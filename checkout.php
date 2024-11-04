<?php
session_start();
$title = "Checkout";
include('header.php');

// Cek jika keranjang kosong
if (empty($_SESSION['keranjang'])) {
    echo "<div class='container mt-5'><h2 class='text-center'>Keranjang Belanja Kosong</h2></div>";
    include('footer.php');
    exit;
}

// Inisialisasi total harga
$totalHarga = 0;

// Cek jika form di-submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $totalHarga = $_POST['totalHarga'];
    $keranjang = unserialize($_POST['keranjang']);

    // Hapus keranjang setelah pemesanan
    unset($_SESSION['keranjang']);
    
    // Tampilkan halaman konfirmasi
    ?>
    <div class="container mt-5">
        <h2 class="text-center">Konfirmasi Pembayaran</h2>
        <h4>Terima kasih, <?php echo htmlspecialchars($nama); ?>!</h4>
        <p>Pesanan Anda telah berhasil diproses.</p>

        <h5>Detail Pemesanan:</h5>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($keranjang as $item): ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['nama']); ?></td>
                    <td>Rp <?php echo number_format($item['harga'], 0, ',', '.'); ?></td>
                    <td>1</td>
                    <td>Rp <?php echo number_format($item['harga'], 0, ',', '.'); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h4 class="text-end">Total Belanja: Rp <?php echo number_format($totalHarga, 0, ',', '.'); ?></h4>
        <h5>Informasi Pengiriman:</h5>
        <p>Nama: <?php echo htmlspecialchars($nama); ?></p>
        <p>Alamat: <?php echo htmlspecialchars($alamat); ?></p>
        <p>Telepon: <?php echo htmlspecialchars($telepon); ?></p>

        <a href="index.php" class="btn btn-primary">Kembali ke Beranda</a>
    </div>
    <?php
} else {
    // Tampilkan form checkout
    ?>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Checkout</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['keranjang'] as $item): 
                    $subtotal = $item['harga'];
                    $totalHarga += $subtotal; 
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['nama']); ?></td>
                    <td>Rp <?php echo number_format($item['harga'], 0, ',', '.'); ?></td>
                    <td>1</td>
                    <td>Rp <?php echo number_format($subtotal, 0, ',', '.'); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h4 class="text-end">Total Belanja: Rp <?php echo number_format($totalHarga, 0, ',', '.'); ?></h4>

        <h4>Informasi Pembeli</h4>
        <form action="checkout.php" method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat Pengiriman</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <div class="mb-3">
                <label for="telepon" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" id="telepon" name="telepon" required>
            </div>
            
            <!-- Hidden fields to send product info -->
            <input type="hidden" name="totalHarga" value="<?php echo $totalHarga; ?>">
            <input type="hidden" name="keranjang" value="<?php echo htmlspecialchars(serialize($_SESSION['keranjang'])); ?>">

            <button type="submit" class="btn btn-success btn-lg">Proses Pembayaran</button>
        </form>
    </div>
    <?php
}

include('footer.php');
?>
