<?php include("./config.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>CRUD</title>
</head>

<body>
    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-between justify-content-lg-between">
                <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <h1>CRUD</h1>
                </a>
                <div class="text-end">
                    <button type="button" class="btn btn-outline-light me-2">Login</button>
                    <button type="button" class="btn btn-warning">Sign-up</button>
                </div>
            </div>
        </div>
    </header>
    <div class="container p-4">
        <div class="row">
            <h1 class="text-center">Toko Koh Aming</h1>
        </div>
        <div class="row d-flex justify-content-center mt-4">
            <div class="col-8 ">
                <div class="d-flex  justify-content-between align-items-center ">

                    <h3 class="">Daftar barang</h3>
                    <a href="tambah.php" class="btn btn-primary p-2 text-decoration-none text-white">Tambah barang</a>
                </div>
                <?php if (isset($_GET['status'])) : ?>
                    <p>
                        <?php
                        if ($_GET['status'] == 'berhasilTambah') {
                            echo '<div class="alert alert-success">Data produk berhasil ditambahkan! </div>';
                        } elseif ($_GET['status'] == 'berhasilEdit') {
                            echo '<div class="alert alert-warning">Data produk berhasil diedit! </div>';
                        } elseif ($_GET['status'] == 'berhasilHapus') {
                            echo '<div class="alert alert-success">Data produk berhasil dihapus! </div>';
                        } else {
                            echo '<div class="alert alert-danger">Gagal! </div>';
                        }
                        ?>
                    </p>
                <?php endif; ?>
                <table class="table table-striped table-hover">
                    <thead>
                        <th>No.</th>
                        <th>Nama Produk</th>
                        <th>Keterangan</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM produk";
                        $query = mysqli_query($db, $sql);
                        $i = 1;
                        while ($produk = mysqli_fetch_array($query)) {
                            echo "<tr>";

                            echo "<td>" . $i . "</td>";
                            echo "<td>" . $produk['nama_produk'] . "</td>";
                            echo "<td>" . $produk['keterangan'] . "</td>";
                            echo "<td>" . $produk['harga'] . "</td>";
                            echo "<td>" . $produk['jumlah'] . "</td>";
                            echo "<td>";
                            echo "<a href='edit.php?id=" . $produk['id'] . "'>Edit</a> | ";
                            echo "<a href='hapus.php?id=" . $produk['id'] . "'>Hapus</a>";
                            echo "</td>";

                            echo "</tr>";

                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
                <p>Total: <?php echo mysqli_num_rows($query) ?></p>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>