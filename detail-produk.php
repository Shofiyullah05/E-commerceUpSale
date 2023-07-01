<?php
error_reporting(0);
session_start();
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
$id_user = $_SESSION['id'];
include 'db.php';



$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '" . $_GET['id'] . "' ");
$p = mysqli_fetch_object($produk);

$id_penjual = $p->user_id;
$kontak = mysqli_query($conn, "SELECT no_telp FROM tb_user WHERE user_id = '" . $id_penjual . "' ");
$u = mysqli_fetch_object($kontak);
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

    <div class="search">
        <div class="container">
            <form action="produk.php">
                <input type="text" name="search" placeholder="Cari Produk" value="<?php echo $_GET['search'] ?>">
                <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
                <input type="submit" name="cari" value="Cari Produk">
            </form>
        </div>
    </div>

    <!-- product detail -->
    <div class="section">
        <div class="container">
            <h3>Detail produk</h3>
            <div class="box">
                <div class="col-2">
                    <img src="/produk/<?php echo $p->product_image ?>" width="100%">
                </div>
                <div class="col-2">
                    <h3><?php echo $p->product_name ?></h3>
                    <?php $namaproduk = $p->product_name ?>
                    <h4>Rp. <?php echo number_format($p->product_price) ?></h4>
                    <p>Deskripsi:<br>
                        <?php echo $p->product_description ?>
                    </p>
                    <p><a href="https://wa.me/<?php echo $u->no_telp ?>?text=Hallo, saya tertarik dengan <?php echo $namaproduk ?> yang anda jual di UP Sale" target="_blank">
                            Hubungan via Whasapp
                            <img src="img/ikon_wa.jpg" width="50px"></a></p>
                </div>
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