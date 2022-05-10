<?php

include("config.php");

if (isset($_POST['tambah'])) {
    $nama = $_POST['namaProduk'];
    $keterangan = $_POST['keterangan'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];

    $sql = "INSERT INTO produk(nama_produk, keterangan, harga, jumlah) VALUE ('$nama', '$keterangan', '$harga', '$jumlah')";
    $query = mysqli_query($db, $sql);

    if ($query) {
        header('Location: index.php?status=berhasilTambah');
    } else {
        header('Location: index.php?status=gagalTambah');
    }
} else {
    die("Access Denied!");
}
