<?php
session_start();

// Cek jika ada produk yang dihapus
if (isset($_GET['index'])) {
    $indexHapus = $_GET['index'];

    // Hapus produk dari keranjang
    if (isset($_SESSION['keranjang'][$indexHapus])) {
        unset($_SESSION['keranjang'][$indexHapus]);
        $_SESSION['keranjang'] = array_values($_SESSION['keranjang']); // Reindex array
    }
}

// Redirect kembali ke halaman keranjang
header('Location: keranjang.php');
exit;
