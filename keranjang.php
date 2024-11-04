<?php
session_start();
$title = "Keranjang Belanja";
include('header.php');

// Inisialisasi total harga
$totalHarga = 0;

// Cek jika keranjang kosong
if (empty($_SESSION['keranjang'])) {
    echo "<div class='container mt-5'><h2 class='text-center'>Keranjang Belanja Kosong</h2></div>";
    include('footer.php');
    exit;
}

// Cek jika ada produk yang dihapus
if (isset($_GET['hapus'])) {
    $indexHapus = $_GET['hapus'];
    unset($_SESSION['keranjang'][$indexHapus]);
    $_SESSION['keranjang'] = array_values($_SESSION['keranjang']); // Reindex array
}
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Keranjang Belanja</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION['keranjang'] as $index => $item): 
                $subtotal = $item['harga'] * $item['jumlah']; 
                $totalHarga += $subtotal; 
            ?>
            <tr>
                <td><img src="<?php echo $item['gambar']; ?>" alt="<?php echo $item['nama']; ?>" style="width: 100px;"></td>
                <td><?php echo $item['nama']; ?></td>
                <td>Rp <?php echo number_format($item['harga'], 0, ',', '.'); ?></td>
                <td><?php echo $item['jumlah']; ?></td>
                <td>Rp <?php echo number_format($subtotal, 0, ',', '.'); ?></td>
                <td>
                    <a href="?hapus=<?php echo $index; ?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h4 class="text-end">Total Belanja: Rp <?php echo number_format($totalHarga, 0, ',', '.'); ?></h4>
    <div class="text-center mt-4">
        <a href="checkout.php" class="btn btn-success btn-lg">Checkout</a>
        <a href="produk.php" class="btn btn-secondary btn-lg">Kembali Belanja</a>
    </div>
</div>

<?php include('footer.php'); ?>
