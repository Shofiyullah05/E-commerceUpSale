<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jual Beli Barang Bekas</title>

    <style>
        input[type=text], select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        }

        input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        }

        input[type=submit]:hover {
        background-color: #45a049;
        }

        div {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
        }
    </style>
</head>
<body>
    <!-- header -->
    <header>
        <div class="container">
            <h1><a href="login.php">UP Sale</a></h1>
        </div>
    </header>

    <!-- content -->
    <div class = "section">
        <h3>Form Registrasi</h3>
        <div class="box">
            <form action="" method="post">
                <ul>
                    <li>
                        <label for="username">Username :</label>
                        <input type="text" name="username" id="username">
                    </li>

                    <li>
                        <label for="password">Password :</label>
                        <input type="text" name="password" id="password">
                    </li>

                    <li>
                        <label for="nama_lengkap">Nama Lengkap :</label>
                        <input type="text" name="nama_lengkap" id="nama_lengkap">
                    </li>

                    <li>
                        <label for="prodi">Prodi :</label>
                        <input type="text" name="prodi" id="prodi">
                    </li>

                    <li>
                        <label for="nim">NIM :</label>
                        <input type="text" name="nim" id="nim">
                    </li>

                    <li>
                        <label for="no_telp">No. Telepon :</label>
                        <input type="text" name="no_telp" id="no_telp">
                    </li>

                    
                    <button type="submit" class="btn-btn primary" name="submit">Buat Akun</button>
                
                </ul>
            </form>
        </div>

        <?php 
            if(isset($_POST['submit'])){
                session_start();
                include 'db.php';
                global $conn;

                $username = $_POST['username'];
                $password = $_POST['password'];
                $nama_lengkap = $_POST['nama_lengkap'];
                $prodi = $_POST['prodi'];
                $nim = $_POST['nim'];
                $no_telp = $_POST['no_telp'];

                $query = "INSERT INTO tb_user
                            VALUES
                            ('', '$username', '$password','$nama_lengkap', '$prodi', '$nim', '$no_telp')
                            ";
                mysqli_query($conn, $query);

                echo '<script>window.location="login.php"</script>';
                return mysqli_affected_rows($conn);
            }
        ?>

    </div>

    <!-- footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2022 - UP Sale. </small>
        </div>
    </footer>
</body>
</html>