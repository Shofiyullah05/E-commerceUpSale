<!DOCTYPE html>

<html lang="en">
    <head>
        
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LOGIN</title>
        <link rel="stylesheet" href="stylelogin.css">
    </head>
<body>
    <div class="box">
    <center>
        
        <img src="logo.jpeg" alt="HTML5 Icon" width="150px" height="175px">
    
    </center>
    <br>
       
       <a class = title>  </a>
       <h3> <center> Marketplace untuk Mahasiswa Universitas Pertamina</center></h4>
        
    </div>
    <div class="form-box">
    <form method="POST">
        <h3>Silahkan Masukkan Username dan Password</h3>
            <div class="textbox">
                <i class="fas fa-user"></i>
                <input type="text" name="user" placeholder="Username">
            </div>
            <div class="textbox">
                <i class="fas fa-lock"></i>
                <input type="password" name="pass" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary" name="submit" value="Login">Login</button>
        </form>
        <a href="registrasi.php">Belum Punya Akun?</a>
    </div>
    
    <?php 
            if(isset($_POST['submit'])){
                session_start();
                include 'db.php';

                $user = mysqli_real_escape_string($conn, $_POST['user']);
                $pass = mysqli_real_escape_string($conn, $_POST['pass']);

                $cek = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '".$user."'AND password = '".MD5($pass)."' ");
                if(mysqli_num_rows($cek)>0){
                    $d = mysqli_fetch_object($cek);
                    $_SESSION['status_login'] = true;
                    $_SESSION['user_apk'] = $d;
                    $_SESSION['id'] = $d->user_id;
                    echo '<script>window.location="dashboard.php"</script>';
                }else{
                    echo '<script>alert("Username atau password Anda Salah!")</script>';
                }
            }
        ?>
</body>
</html>

