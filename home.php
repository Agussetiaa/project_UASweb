<?php
session_start();
$title ='Home';
include_once 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Agus Rian UAS</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body style="margin-top: 30px; background-color: #8B008B; background: url(t2.jpg)">
    <h1 style="color: 191825191825; text-align: center;">SELAMAT DATANG DI WEB CEKLIST TOILET</h1>
    <div class = "container" style= "width: 500px; padding: 30px;">
        <ul class="list-group">
            <li class="list-group-item active" aria-current="true" style="background-color: #EE82EE font-size: 50px; text-align: center;  ;">Menu</li>
            <li class="list-group-item" type="" style="font-size: 20px; color: #FFFFFF;"><a style="color: #FF0000;" href="index.php">Checklist Toilet</a></li>
            <li class="list-group-item" style="font-size: 20px; color: #FFFFFF;"><a style="color: #144272;" href="ind_toilet.php">Data Toilet</a></li>
        </ul>
    </div>
    <div class="d-grid gap-2 container" style="width: 100px">
        <button class="btn" type="button" style="background-color: #008080"><a style="color: #FFFFFF" href="login.php">Logout</a></button>
    </div>
</body>
</html>