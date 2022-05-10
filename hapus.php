<?php

include("config.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM produk WHERE id=$id";
    $query = mysqli_query($db, $sql);

    if ($query) {
        header('Location: index.php?status=berhasilHapus');
    } else {
        header('Location: index.php?status=gagalHapus');
    }
} else {
    die("Access Denied!");
}
