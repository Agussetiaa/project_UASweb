<?php
error_reporting(E_ALL);
include_once 'koneksi.php';

if (isset($_POST['submit']))
{
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $stat = $_POST['stat'];
    $rol = $_POST['rol'];

    $sql = 'INSERT INTO users ( username, pass, nama, email, stat, rol)';
    $sql .= "VALUE ('$username', '$pass', '$nama', '$email', '$stat', '$rol')";
    $result = mysqli_query($conn, $sql);
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Akun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body style="margin-top: 30px; background-color: #0A2647; display: flex; justify-content: center; align-items: center; height: 100vh;  background: url(t1.jpg) center center fixed">
    <div class="container" style="background-color: #91C8E4; width: 30%; padding: 20px; border-radius: 10px; box-shadow: 0px 0px 10px 0px #000000;">
        <h1 style="color: #000000; text-align: center; margin-bottom: 20px;">Tambah Akun</h1>
        <div class="main">
            <form method="post" action="tam_login.php" enctype="multipart/form-data">    
                <div class="mb-3" style="padding: 2px; border-radius: 10px;">
                    <label for="inputUsername" class="form-label" style="color: #000000;">Username</label>
                    <input type="text" name="username" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" style="background-color: #fffff; color: #000000;">
                </div>
                <div class="mb-3" style="padding: 2px; border-radius: 10px;">
                    <label for="inputPassword" class="form-label" style="color: #000000;">Password</label>
                    <input type="password" name="pass" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" style="background-color:  #fffff; color: #000000;">
                </div>
                <div class="mb-3" style="padding: 2px; border-radius: 10px;">
                    <label for="inputNama" class="form-label" style="color: #000000;">Nama</label>
                    <input type="text" name="nama" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" style="background-color:  #fffff; color: #000000;">
                </div>
                <div class="mb-3" style="padding: 2px; border-radius: 10px;">
                    <label for="inputEmail" class="form-label" style="color: #000000;">E-mail</label>
                    <input type="text" name="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" style="background-color:  #fffff; color: #000000;">
                </div> 
                <div class="">
                    <h6 style="color: #000000;">Status</h6>
                    <select class="form-select" aria-label="Default select example" name="stat">
                        <option value=""></option>
                        <option value="Aktif">Aktif</option>
                        <option value="Nonaktif">Non Aktif</option>
                    </select>
                </div><br>
                <div class="">
                    <h6 style="color: #000000;">Role</h6>
                    <select class="form-select" aria-label="Default select example" name="rol">
                        <option value=""></option>
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>
                    </select>
                </div> <br>
                <div class="text-center">
                    <input type="submit" name="submit" value="Simpan" class="btn" style="background-color: #3559E0; color: #FFFFFF; width: 100%;">
                </div>
            </form>
        </div>
    </div>
</body>

</html>