<?php
session_start();
$title ='Login';
include_once 'koneksi.php';

if (isset($_POST['submit'])){
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM users WHERE username = '{$username}' AND pass = '{$pass}'";

    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_affected_rows($conn) !=0){
        $_SESSION['login'] = true;
        $_SESSION['username'] = mysqli_fetch_array($result);

        header('location: home.php');
    }else
    $errorMsg = "<p style=\"color:red;\">Gagal Login,
    silakan ulangi lagi.</p>";
}
if (isset($errorMsg)) echo $errorMsg;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Web Ceklist Toilet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body style="margin-top: 30px; background: url(t1.jpg) center center fixed">
<div class="container" style="background-color: #91C8E4; max-width: 450px; padding: 10px; border-radius:20px">
<h2 style="color: #FFFFFF; text-align: center;">DATA CHECKLIST KEBERSIHAN TOILET</h2><br>
<h3 style="color: #181823; text-align: center;">LOGIN</h3><br>
    <form method="POST">
        <div class="mb-3" style=" padding: 10px; border-radius: 30px;">
        <label for="inputUsername" class="form-label" style="color: #FFFFFF;">Username</label>
        <input type="text" class="form-control" id="inputUsername" placeholder="Silahkan Masukan username" name="username" style="color: #000000;">
    </div>

    <div class="mb-3" style="padding: 10px; border-radius: 10px;">
        <label for="inputPassword" class="form-label" style="color: #FFFFFF;">Password</label>
        <input type="password" class="form-control" id="inputPassword" placeholder="Silahkan Masukan password" name="pass">
    </div>
    <div class="mb-3" style="width: 100%; text-align: center;">
    <button type="submit" name="submit" class="btn btn-block" style="background-color: #3559E0; color: #FFFFFF; width: 150px;">Login</button>
    </div>
    <div class="mb-3" style="text-align: right; width: 100%; color: #FFFFFF;">
        <p>Belum memiliki akun?</p>
        <a href="tam_login.php" style="color: #3559E0;">Buat Akun Baru</a>
    </div>
    </form>
</div>
</body>
