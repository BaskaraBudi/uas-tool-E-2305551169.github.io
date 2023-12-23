<?php

session_start();
include '../config.php';

$id_produk = $_GET['id_produk'];
$produk = query("SELECT * FROM produk WHERE id_produk = '$id_produk'")[0];

if (isset($_POST['edit'])) {
    $nama = mysqli_real_escape_string($conn, $_POST["nama"]);
    $harga = mysqli_real_escape_string($conn, $_POST["harga"]);

    // Cek apakah ada file gambar yang diupload
    if ($_FILES['gambar']['error'] === 4) {
        // Jika tidak ada gambar yang diupload, maka tidak perlu mengubah gambar
        mysqli_query($conn, "UPDATE produk SET 
            nama_produk = '$nama',
            harga = '$harga'
            WHERE id_produk = '$id_produk'
        ");
    } else {
        // Jika ada gambar yang diupload, proses gambar yang baru
        $gambar = upload();
        if ($gambar) {
            mysqli_query($conn, "UPDATE produk SET 
                gambar = '$gambar',
                nama_produk = '$nama',
                harga = '$harga'
                WHERE id_produk = '$id_produk'
            ");
        }
    }

    if (mysqli_affected_rows($conn) > 0) {
        echo "
            <script>
                alert('Berhasil Edit Produk!');
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
                            <h1 class="px-5 mt-3">Edit Produk</h1>
                        </div>
                        <br>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <img src="../img-product/<?= $produk['gambar']; ?>" style="width:100px;height:100px" class="mb-3">
                            <input name="gambar" type="file" placeholder="Gambar" class="form-control mb-4">
                            <input name="nama" value="<?= $produk['nama_produk']; ?>" type="text" placeholder="Nama Produk" class="form-control mb-4" required>
                            <input name="harga" value="<?= $produk['harga']; ?>" type="number" placeholder="Harga (input tanpa spasi dan tanda baca)" class="form-control mb-4" required>
                            <center>
                                <button name="edit" type="submit" class="btn btn-success w-100">Edit</button>
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