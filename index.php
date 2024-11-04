<?php
$title = "Kamera DSLR - Home";
include('header.php');
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }
        .banner {
    background: url('assets/images/dslr_beranda.jpg') no-repeat center center;
    background-size: cover;
    height: 600px; /* Increased height */
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    text-align: center;
    position: relative;
}

.banner h1 {
    font-size: 3rem; /* Increased font size for better visibility */
    margin: 0;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
}

.banner p {
    font-size: 1.5rem; /* Increased paragraph font size */
    margin: 15px 0;
}

.banner button {
    padding: 15px 30px; /* Increased button padding */
    font-size: 1.2rem; /* Increased button font size */
    background-color: #28a745;
    color: white;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s;


        }
        .banner button:hover {
            background-color: #218838;
        }
        .content {
            display: none; /* Sembunyikan konten awal */
        }
        .card {
            transition: transform 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }
        .card-title {
            font-size: 1.25rem;
            margin-bottom: 10px;
        }
        .card-text {
            font-size: 1.1rem;
        }
        .alert {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }
    </style>
    <script>
        function showContent() {
            document.querySelector('.content').style.display = 'block'; // Tampilkan konten
            document.querySelector('.banner').style.display = 'none'; // Sembunyikan banner
        }
    </script>
</head>
<body>
    <div class="wrapper">
        <!-- Banner Section -->
        <div class="banner">
            <div>
                <h1>Selamat Datang di Toko Kamera DSLR</h1>
                <p>Menyediakan berbagai kamera DSLR terbaik untuk semua kebutuhan fotografi Anda.</p>
                <button onclick="showContent()">Lihat Katalog</button>
            </div>
        </div>

        <div class="content">
            <div class="container mt-5">
                <div class="row align-items-center mb-5">
                    <div class="col-md-6">
                        <div class="header-bg text-center p-4 animated-header">
                            <h1 class="display-4">Selamat Datang di Toko Kamera DSLR</h1>
                            <p class="lead">Menyediakan berbagai kamera DSLR terbaik untuk semua kebutuhan fotografi Anda.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <video class="img-fluid rounded shadow" controls autoplay muted>
                            <source src="assets/videos/dlzz.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>

                <!-- Promotional Banner Section -->
                <div class="alert alert-success text-center mb-5" role="alert">
                    <h4 class="alert-heading">Promo Spesial!</h4>
                    <p>Dapatkan diskon <strong>10%</strong> untuk setiap pembelian kamera DSLR!</p>
                    <hr>
                    <p class="mb-0">
                        <strong>Gunakan kode promo: <span class="text-danger">WAHYUGANTENG</span> saat checkout.</strong>
                    </p>
                </div>

                <h2 class="text-center mb-4">Katalog Produk Kami</h2>
                <div class="row">
                    <?php 
                    $products = [
                        [
                            "name" => "Canon EOS 1500D",
                            "price" => "Rp 8.999.000",
                            "img" => "assets/images/canon_dslr.jpg",
                            "link" => "pemesanan.php?produk=Canon%20EOS%201500D"
                        ],
                        [
                            "name" => "Nikon D3500",
                            "price" => "Rp 5.350.000",
                            "img" => "assets/images/nikon.jpg",
                            "link" => "pemesanan.php?produk=Nikon%20D3500"
                        ],
                        [
                            "name" => "Sony Alpha A6000",
                            "price" => "Rp 6.500.000",
                            "img" => "assets/images/sony.jpg",
                            "link" => "pemesanan.php?produk=Sony%20Alpha%20A6000"
                        ],
                        [
                            "name" => "Canon EOS M50",
                            "price" => "Rp 9.599.000",
                            "img" => "assets/images/canon_m50.jpg",
                            "link" => "pemesanan.php?produk=Canon%20EOS%20M50"
                        ],
                        [
                            "name" => "Fujifilm X-T30",
                            "price" => "Rp 13.000.000",
                            "img" => "assets/images/fuji1.jpg",
                            "link" => "pemesanan.php?produk=Fujifilm%20X-T30"
                        ],
                        [
                            "name" => "Olympus OM-D E-M10",
                            "price" => "Rp 7.500.000",
                            "img" => "assets/images/olympus.jpg",
                            "link" => "pemesanan.php?produk=Olympus%20OM-D%20E-M10"
                        ]
                    ];

                    foreach ($products as $product) {
                        echo '
                        <div class="col-md-4 mb-4">
                            <div class="card animated-card">
                                <img src="'.$product['img'].'" class="card-img-top img-resized" alt="'.$product['name'].'">
                                <div class="card-body text-center">
                                    <h5 class="card-title">'.$product['name'].'</h5>
                                    <p class="card-text">Harga: <strong>'.$product['price'].'</strong></p>
                                    <a href="'.$product['link'].'" class="btn btn-success">Beli</a>
                                </div>
                            </div>
                        </div>';
                    }
                    ?>
                </div>
            </div>
        </div>

        <?php include('footer.php'); ?>
    </div>
</body>
</html>
