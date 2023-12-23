<?php
session_start();
include '../config.php';

$id_produk = $_GET['id_produk'];
mysqli_query($conn, "DELETE FROM produk WHERE id_produk = '$id_produk'");
echo "
        <script>
            alert('Data berhasil dihapus!');
            window.location.href='data_produk.php';
        </script>
    ";