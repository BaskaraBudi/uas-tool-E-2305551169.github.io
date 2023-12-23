<?php

session_start();
include '../config.php';
$id_user = $_SESSION['id_user'];
$produk = mysqli_query($conn, "SELECT * FROM produk");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skincare</title>
    <link href="../css/app.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">

        <?php include 'sidebar.php' ?>

        <div class="main">

            <main class="content p-4">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body p-5">
                                    <h1 class="mb-5">Daftar Produk</h1>


                                    <div class="row">
                                        <?php foreach ($produk as $td) : ?>
                                            <div class="card mx-4 col-lg-4 col-md-4 col-sm-12" style="width: 18rem;">
                                                <img class="card-img-top" src="../img-product/<?= $td['gambar']; ?>">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?= $td['nama_produk']; ?></h5>
                                                    <p class="card-text text-dark">Rp <?= number_format($td['harga'], 0); ?>
                                                    </p>
                                                    <a href="tambah_pesanan.php?id_user=<?= $id_user; ?>&id_produk=<?= $td['id_produk']; ?>" class="btn btn-primary w-100">Beli</a>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </main>

        </div>
    </div>

    <script src="js/app.js"></script>

</body>

</html>