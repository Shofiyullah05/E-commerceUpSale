<?php
    error_reporting(0);
    session_start();
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }

    include 'db.php';
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

    <!-- new product -->
    <div class="section">
        <div class="container">
            <h3>Produk </h3>
            <div class="box">
                <?php
                    if($_GET['search'] != '' || $_GET['kat'] != '' ){
                        $where = "AND product_name LIKE '%".$_GET['search']."%' AND category_id LIKE '%".$_GET['kat']."%' ";
                    }

                    $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 $where ORDER BY product_id  DESC");

                    if(mysqli_num_rows($produk) > 0){
                        while($p = mysqli_fetch_array($produk)){
                ?>
                        <a href="detail-produk.php?id= <?php echo $p['product_id'] ?> ">
                            <div class="col-4">
                                <img src="produk/<?php echo $p['product_image'] ?>">
                                <p class="nama"><?php echo substr($p['product_name'], 0, 30) ?></p>
                                <p class="harga">Rp. <?php echo number_format($p['product_price']) ?></p>
                            </div>
                        </a>
                <?php }}else{ ?>
                    <p>Produk Tidak Ada </p>
                <?php } ?>
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