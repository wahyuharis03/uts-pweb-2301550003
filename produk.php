<?php
session_start();
$title = "Detail Produk";
include('header.php');

// Inisialisasi keranjang jika belum ada
if (!isset($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = [];
}

// Cek jika ada produk yang ditambahkan
if (isset($_POST['add_to_cart'])) {
    $produk = $_POST['produk'];
    $harga = $_POST['harga'];
    $gambar = $_POST['gambar'];
    $jumlah = $_POST['jumlah'];

    // Cek jika produk sudah ada di keranjang
    $found = false;
    foreach ($_SESSION['keranjang'] as &$item) {
        if ($item['nama'] === $produk) {
            $item['jumlah'] += $jumlah; // Update quantity
            $found = true;
            break;
        }
    }

    if (!$found) {
        // Tambahkan produk baru ke keranjang
        $_SESSION['keranjang'][] = [
            'nama' => $produk,
            'harga' => $harga,
            'gambar' => $gambar,
            'jumlah' => $jumlah,
        ];
    }

    header('Location: keranjang.php'); // Kembali ke halaman keranjang
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="path/to/bootstrap.css">
    <link rel="stylesheet" href="style.css">


    <style>
        .card {
            border: 1px solid #ddd; /* Add a border around the card */
            border-radius: 8px; /* Rounded corners */
            overflow: hidden; /* Ensure the corners stay rounded */
            transition: transform 0.2s; /* Animation for hover effect */
        }

        .card:hover {
            transform: scale(1.05); /* Scale up the card on hover */
        }

        .image-container {
            position: relative; /* Position for absolute children */
            height: 250px; /* Set a fixed height for the image container */
            overflow: hidden; /* Hide overflow */
        }

        .image-container img {
            width: 100%; /* Make images responsive */
            height: 100%; /* Ensure images fill the container */
            object-fit: cover; /* Maintain aspect ratio */
            transition: opacity 0.5s; /* Fade effect */
            position: absolute; /* Overlay the second image */
            top: 0;
            left: 0;
        }

        .image-container .second-image {
            opacity: 0; /* Hide the second image by default */
        }

        .image-container:hover .second-image {
            opacity: 1; /* Show the second image on hover */
        }

        .image-container:hover .primary-image {
            opacity: 0; /* Hide the first image on hover */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Detail Produk</h2>
        <div class="row mt-4">

            <!-- Product 1: Canon EOS 1500D -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="image-container">
                        <img src="assets/images/canon_dslr.jpg" class="card-img-top primary-image" alt="Canon EOS 1500D">
                        <img src="assets/images/canondslr2.jpg" class="card-img-top second-image" alt="Canon EOS 1500D Second View">
                    </div>
                    <div class="card-body text-center">
                        <h3 class="card-title">Canon EOS 1500D</h3>
                        <h4 class="card-price">Harga: Rp 8.999.000</h4>
                        <p><strong>Deskripsi:</strong> Kamera DSLR dengan sensor 24.1 MP yang cocok untuk pemula.</p>
                        <p><strong>Spesifikasi:</strong></p>
                        <ul>
                            <li>Sensor: APS-C, 24.1 MP</li>
                            <li>ISO: 100-25600</li>
                            <li>Video: 1080p Full HD</li>
                            <li>Wi-Fi dan NFC</li>
                        </ul>
                        <form method="POST" action="">
                            <input type="hidden" name="produk" value="Canon EOS 1500D">
                            <input type="hidden" name="harga" value="8999000">
                            <input type="hidden" name="gambar" value="assets/images/canon_dslr.jpg">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="jumlah1">Jumlah:</label>
                                <input type="number" class="form-control" name="jumlah" min="1" value="1" id="jumlah1">
                            </div>
                            <button type="submit" name="add_to_cart" class="btn btn-primary">Tambah ke Keranjang</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Product 2: Nikon D3500 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="image-container">
                        <img src="assets/images/nikon.jpg" class="card-img-top primary-image" alt="Nikon D3500">
                        <img src="assets/images/nik3.jpg" class="card-img-top second-image" alt="Nikon D3500 Second View">
                    </div>
                    <div class="card-body text-center">
                        <h3 class="card-title">Nikon D3500</h3>
                        <h4 class="card-price">Harga: Rp 5.350.000</h4>
                        <p><strong>Deskripsi:</strong> Kamera DSLR dengan performa tinggi dan baterai tahan lama.</p>
                        <p><strong>Spesifikasi:</strong></p>
                        <ul>
                            <li>Sensor: APS-C, 24.2 MP</li>
                            <li>ISO: 100-25600</li>
                            <li>Video: 1080p Full HD</li>
                            <li>Bluetooth untuk transfer gambar</li>
                        </ul>
                        <form method="POST" action="">
                            <input type="hidden" name="produk" value="Nikon D3500">
                            <input type="hidden" name="harga" value="5350000">
                            <input type="hidden" name="gambar" value="assets/images/nikon.jpg">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="jumlah2">Jumlah:</label>
                                <input type="number" class="form-control" name="jumlah" min="1" value="1" id="jumlah2">
                            </div>
                            <button type="submit" name="add_to_cart" class="btn btn-primary">Tambah ke Keranjang</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Product 3: Sony Alpha A6000 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="image-container">
                        <img src="assets/images/sony.jpg" class="card-img-top primary-image" alt="Sony Alpha A6000">
                        <img src="assets/images/sony2.jpg" class="card-img-top second-image" alt="Sony Alpha A6000 Second View">
                    </div>
                    <div class="card-body text-center">
                        <h3 class="card-title">Sony Alpha A6000</h3>
                        <h4 class="card-price">Harga: Rp 6.500.000</h4>
                        <p><strong>Deskripsi:</strong> Kamera mirrorless dengan autofokus cepat dan gambar berkualitas tinggi.</p>
                        <p><strong>Spesifikasi:</strong></p>
                        <ul>
                            <li>Sensor: APS-C, 24.3 MP</li>
                            <li>ISO: 100-25600</li>
                            <li>Video: 1080p Full HD</li>
                            <li>Wi-Fi dan NFC</li>
                        </ul>
                        <form method="POST" action="">
                            <input type="hidden" name="produk" value="Sony Alpha A6000">
                            <input type="hidden" name="harga" value="6500000">
                            <input type="hidden" name="gambar" value="assets/images/sony.jpg">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="jumlah3">Jumlah:</label>
                                <input type="number" class="form-control" name="jumlah" min="1" value="1" id="jumlah3">
                            </div>
                            <button type="submit" name="add_to_cart" class="btn btn-primary">Tambah ke Keranjang</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Product 4: Canon EOS M50 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="image-container">
                        <img src="assets/images/canon_m50.jpg" class="card-img-top primary-image" alt="Canon M50">
                        <img src="assets/images/eos2.png" class="card-img-top second-image" alt="Canon M50 Second View">
                    </div>
                    <div class="card-body text-center">
                        <h3 class="card-title">Canon EOS M50</h3>
                        <h4 class="card-price">Harga: Rp 9.500.000</h4>
                        <p><strong>Deskripsi:</strong> Kamera mirrorless dengan touchscreen dan konektivitas canggih.</p>
                        <p><strong>Spesifikasi:</strong></p>
                        <ul>
                            <li>Sensor: APS-C, 24.1 MP</li>
                            <li>ISO: 100-25600</li>
                            <li>Video: 4K</li>
                            <li>Wi-Fi dan Bluetooth</li>
                        </ul>
                        <form method="POST" action="">
                            <input type="hidden" name="produk" value="Canon EOS M50">
                            <input type="hidden" name="harga" value="9500000">
                            <input type="hidden" name="gambar" value="assets/images/canon_m50.jpg">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="jumlah4">Jumlah:</label>
                                <input type="number" class="form-control" name="jumlah" min="1" value="1" id="jumlah4">
                            </div>
                            <button type="submit" name="add_to_cart" class="btn btn-primary">Tambah ke Keranjang</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Product 5: Fujifilm X-T30 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="image-container">
                        <img src="assets/images/fuji1.jpg" class="card-img-top primary-image" alt="Fujifilm X-T30">
                        <img src="assets/images/fuji2.jpg" class="card-img-top second-image" alt="Fujifilm X-T30 Second View">
                    </div>
                    <div class="card-body text-center">
                        <h3 class="card-title">Fujifilm X-T30</h3>
                        <h4 class="card-price">Harga: Rp 13.000.000</h4>
                        <p><strong>Deskripsi:</strong> Kamera mirrorless dengan desain retro dan kontrol manual yang lengkap.</p>
                        <p><strong>Spesifikasi:</strong></p>
                        <ul>
                            <li>Sensor: APS-C, 26.1 MP</li>
                            <li>ISO: 160-12800</li>
                            <li>Video: 4K</li>
                            <li>Wi-Fi dan Bluetooth</li>
                        </ul>
                        <form method="POST" action="">
                            <input type="hidden" name="produk" value="Fujifilm X-T30">
                            <input type="hidden" name="harga" value="13000000">
                            <input type="hidden" name="gambar" value="assets/images/fuji1.jpg">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="jumlah5">Jumlah:</label>
                                <input type="number" class="form-control" name="jumlah" min="1" value="1" id="jumlah5">
                            </div>
                            <button type="submit" name="add_to_cart" class="btn btn-primary">Tambah ke Keranjang</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Product 6: Olympus OM-D E-M10 Mark III -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="image-container">
                        <img src="assets/images/olympus.jpg" class="card-img-top primary-image" alt="Olympus OM-D E-M10 Mark III">
                        <img src="assets/images/oly3.jpg" class="card-img-top second-image" alt="Olympus OM-D E-M10 Mark III Second View">
                    </div>
                    <div class="card-body text-center">
                        <h3 class="card-title">Olympus OM-D E-M10 Mark III</h3>
                        <h4 class="card-price">Harga: Rp 11.500.000</h4>
                        <p><strong>Deskripsi:</strong> Kamera mirrorless dengan fitur canggih dan desain yang kompak.</p>
                        <p><strong>Spesifikasi:</strong></p>
                        <ul>
                            <li>Sensor: Micro Four Thirds, 16 MP</li>
                            <li>ISO: 200-25600</li>
                            <li>Video: 4K</li>
                            <li>Wi-Fi dan Bluetooth</li>
                        </ul>
                        <form method="POST" action="">
                            <input type="hidden" name="produk" value="Olympus OM-D E-M10 Mark III">
                            <input type="hidden" name="harga" value="11500000">
                            <input type="hidden" name="gambar" value="assets/images/olympus.jpg">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="jumlah6">Jumlah:</label>
                                <input type="number" class="form-control" name="jumlah" min="1" value="1" id="jumlah6">
                            </div>
                            <button type="submit" name="add_to_cart" class="btn btn-primary">Tambah ke Keranjang</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php include('footer.php'); ?>
</body>
</html>
