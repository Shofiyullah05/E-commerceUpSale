<?php 
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }
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
            <h3>Tambah Data Kategori</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama_kategori" placeholder="Nama_Kategori" class="input-control" required>
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>

                <?php 
                    if(isset($_POST['submit'])){
                        $nama_kategori = ucwords($_POST['nama_kategori']);

                        $insert = mysqli_query($conn, "INSERT INTO tb_category VALUE (
                                            null,
                                            '".$nama_kategori."')");
                        
                        if($insert){
                            echo '<script>alert("Tambah Data Berhasil")</script>';
                            echo '<script>window.location="data-kategori.php"</script>';
                        }else{
                            echo 'gagal' .mysqli_error($conn);
                        }
                    }
                ?>
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