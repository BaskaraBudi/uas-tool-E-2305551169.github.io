<?php

session_start();
include '../config.php';


if (isset($_POST['daftar'])) {
    $gambar = upload();
    $nama = mysqli_real_escape_string($conn, $_POST["nama"]);
    $harga = mysqli_real_escape_string($conn, $_POST["harga"]);

    mysqli_query($conn, "INSERT INTO produk VALUES(NULL, '$gambar', '$nama', '$harga')");
    if (mysqli_affected_rows($conn) > 0) {
        echo "
            <script>
                alert('Berhasil Tambah Produk!');
                window.location.href='data_produk.php'
            </script>
        ";
    } else {
        echo mysqli_error($conn);
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skincare</title>
    <link href="../css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>


<body>
    <div class="wrapper">
        <div class="main">
            <main class="content" style="background-image: url('img/bg-index.jpeg'); background-size: cover;">
                <div class="container-fluid p-0">

                    <div class="row card border p-5" style="margin: 50px 400px 50px 400px; box-shadow: 4px 4px 4px gray">

                        <div class="d-flex justify-content-center">
                            <h1 class="px-5 mt-3">Tambah Produk</h1>
                        </div>
                        <br>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input name="gambar" type="file" placeholder="Gambar" class="form-control mb-4" required>
                            <input name="nama" type="text" placeholder="Nama Produk" class="form-control mb-4" required>
                            <input name="harga" type="number" placeholder="Harga (input tanpa spasi dan tanda baca)" class="form-control mb-4" required>
                            <center>
                                <button name="daftar" type="submit" class="btn btn-success w-100">Tambah</button>
                        </form>
                        <br><br>
                        <a href="data_produk.php">Kembali</a>
                        </center>
                    </div>


                </div>
            </main>
        </div>
    </div>

</body>

</html>