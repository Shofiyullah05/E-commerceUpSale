<?php 
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }

    $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE user_id= '".$_SESSION['id']."' ");
    $d = mysqli_fetch_object($query);
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
            <h3>Profil</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama_lengkap" placeholder="Nama_Lengkap" class="input-control" value="<?php echo $d->nama_lengkap ?>" required>
                    <input type="text" name="prodi" placeholder="Prodi" class="input-control" value="<?php echo $d->prodi ?>" required>
                    <input type="text" name="nim" placeholder="NIM" class="input-control" value="<?php echo $d->nim ?>" required>
                    <input type="text" name="no_telp" placeholder="No_Telp" class="input-control" value="<?php echo $d->no_telp ?>" required>
                    <input type="submit" name="submit" value="Ubah Profil" class="btn">
                </form>

                <?php 
                    if(isset($_POST['submit'])){
                        $nama_lengkap   = ucwords($_POST['nama_lengkap']);
                        $prodi  = ucwords($_POST['prodi']);
                        $nim    = $_POST['nim'];

                        $update = mysqli_query($conn, "UPDATE tb_user SET
                                        nama_lengkap = '".$nama_lengkap."',
                                        prodi = '".$prodi."',
                                        nim = '".$nim."' ,
                                        no_telp = '".$no_telp."' 
                                        WHERE user_id = '".$d->user_id."' ");
                        
                        if($update){
                            echo '<script>alert("Ubah data berhasil")</script>';
                            echo '<script>window.location="profil.php"</script>';
                        }else{
                            echo 'gagal' .mysqli_error($conn);
                        }
                    }
                ?>
            </div>

            <h3>Ubah Password</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="password" name="pass1" placeholder="Password Baru" class="input-control" required>
                    <input type="password" name="pass2" placeholder="Konfirmasi Password" class="input-control" required>
                    <input type="submit" name="ubah_password" value="Ubah Password" class="btn">
                </form>

                <?php 
                    if(isset($_POST['ubah_password'])){
                        $pass1   = $_POST['pass1'];
                        $pass2  = $_POST['pass2'];

                        if($pass2 != $pass1){
                            echo '<script>alert("Konfirmasi Password Baru Tidak Sesuai)</script>';
                        }else{
                            $u_pass = mysqli_query($conn, "UPDATE tb_user SET
                                        password = '".MD5($pass1)."'
                                        WHERE user_id = '".$d->user_id."' ");
                            if($u_pass){
                                echo '<script>alert("Ubah password berhasil")</script>';
                                echo '<script>window.location="profil.php"</script>';
                            }else{
                                echo 'gagal' .mysqli_error($conn);
                            }
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