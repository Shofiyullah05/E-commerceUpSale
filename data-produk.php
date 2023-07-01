<?php
session_start();
include 'db.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

$id_user = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jual Beli Barang Bekas</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <!-- header -->
    <header>
        <div class="container">
            <h1><a href="dashboard.php">UP Sale</a></h1>
            <ul>
                <li><a href="dashboard.php">Produk</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="data-produk.php">Jual Barang</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </header>

    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Jual Produk</h3>
            <div class="box">
                <a href="tambah-produk.php" id="tambah-btn"><button>Tambah Data</button></a><br><br>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Kategori</th>
                            <th>Gambar</th>
                            <th>Status</th>
                            <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $produk = mysqli_query($conn, "SELECT * FROM tb_product LEFT JOIN tb_category USING (category_id) WHERE user_id = '" . $id_user . "' ORDER BY product_id DESC");
                        if (mysqli_num_rows($produk) > 0) {
                            while ($row = mysqli_fetch_array($produk)) {
                        ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row['product_name'] ?></td>
                                    <td>Rp.<?php echo number_format($row['product_price']) ?></td>
                                    <td><?php echo $row['category_name'] ?></td>
                                    <td><a href="produk/<?php echo $row['product_image'] ?>" target="_blank"><img src="produk/<?php echo $row['product_image'] ?>" width="50px"></a></td>
                                    <td><?php echo ($row['product_status']) ? 'Tersedia' : 'Tidak Tersedia' ?></td>
                                    </td>
                                    <td>
                                        <a href="edit-produk.php?id=<?php echo $row['product_id'] ?>">Edit</a> ||
                                        <a href="proses-hapus.php?idp= <?php echo $row['product_id'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php }
                        } else { ?>
                            <tr>
                                <td colspan="7">Tidak ada data</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2022 - UP Sale. </small>
        </div>
    </footer>
</body>

</html>