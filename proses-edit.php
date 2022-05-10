<?php

include("config.php");
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama = $_POST['namaProduk'];
    $keterangan = $_POST['keterangan'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];

    $sql = "UPDATE produk SET nama_produk='$nama', keterangan='$keterangan', harga='$harga', jumlah='$jumlah' WHERE id=$id";
    $query = mysqli_query($db, $sql);

    if ($query) {
        header('Location: index.php?status=berhasilEdit');
    } else {
        header('Location: index.php?status=gagalEdit');
    }
} else {
    die("Access Denied!");
}
