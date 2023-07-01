<?php 
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }

    $kategori = mysqli_query($conn, "SELECT * FROM tb_category WHERE category_id= '".$_GET['id']."' ");
    if(mysqli_num_rows($kategori) == 0){
        echo'<script>window.location="data-kategori.php"</script>';
    }
    $k = mysqli_fetch_object($kategori);
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
            <h3>Edit Data Kategori</h3> 
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama_kategori" placeholder="Nama_Kategori" class="input-control" value="<?php echo $k->category_name ?>" required>
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>

                <?php 
                    if(isset($_POST['submit'])){
                        $nama_kategori = ucwords($_POST['nama_kategori']);

                        $update = mysqli_query($conn, "UPDATE tb_category SET 
                                                category_name='".$nama_kategori."' 
                                                WHERE category_id='".$k->category_id."' ");
                        
                        if($update){
                            echo '<script>alert("Edit Data Berhasil")</script>';
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