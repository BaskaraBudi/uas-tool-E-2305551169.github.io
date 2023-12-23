<?php

session_start();
include '../config.php';

$id_user = $_GET['id_user'];
$id_produk = $_GET['id_produk'];

mysqli_query($conn, "INSERT INTO pesanan VALUES(NULL, '$id_user', '$id_produk')");
if (mysqli_affected_rows($conn) > 0) {
    echo "
            <script>
                alert('Berhasil Beli Produk!');
                window.location.href='data_pembelian.php'
            </script>
        ";
} else {
    echo mysqli_error($conn);
}
