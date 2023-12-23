<?php

session_start();
include '../config.php';
$pembeli = mysqli_query($conn, "SELECT * FROM user WHERE id_level = '2'");

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
                                    <h1 class="mb-2">Data Pembeli</h1>
                                    <div class="table-responsive">
                                        <table class="table table-responsive table-hover text-dark text-center">
                                            <thead>
                                                <tr class="table table-primary">
                                                    <th>Nama</th>
                                                    <th>Alamat</th>
                                                    <th>No HP</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($pembeli as $td) : ?>
                                                    <tr>
                                                        <td><?= $td['nama'] ?></td>
                                                        <td><?= $td['alamat'] ?></td>
                                                        <td><?= $td['nohp'] ?></td>
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