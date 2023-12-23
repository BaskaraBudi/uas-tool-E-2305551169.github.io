<?php

session_start();
include '../config.php';
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
                                    <h1 class="mb-2">Data Produk</h1>
                                    <a href="tambah_produk.php">Tambah Produk</a>
                                    <div class="table-responsive">
                                        <table class="table table-responsive table-hover text-dark text-center">
                                            <thead>
                                                <tr class="table table-primary">
                                                    <th>Gambar</th>
                                                    <th>Nama</th>
                                                    <th>Harga</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($produk as $td) : ?>
                                                    <tr>
                                                        <td><img src="../img-product/<?= $td['gambar'] ?>" style="width:150px; height:150px"></td>
                                                        <td><?= $td['nama_produk'] ?></td>
                                                        <td><?= $td['harga'] ?></td>
                                                        <td>
                                                            <a href="edit_produk.php?id_produk=<?= $td['id_produk']; ?>" class="btn btn-warning">Edit</a>
                                                            <a href="hapus_produk.php?id_produk=<?= $td['id_produk']; ?>" onclick="return confirm('Yakin ingin hapus ?')" class="btn btn-danger">Hapus</a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>

                                        </table>
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