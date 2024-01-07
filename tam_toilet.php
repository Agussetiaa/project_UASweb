<?php
error_reporting(E_ALL);
include_once 'koneksi.php';

if (isset($_POST['submit']))
{
    $toilet_id = $_POST['toilet_id'];
    $lokasi = $_POST['lokasi'];
    $keterangan = $_POST['keterangan'];

    $sql = 'INSERT INTO toilet (id, lokasi, keterangan) ';
    $sql .= "VALUE ('{$toilet_id}', '{$lokasi}', '{$keterangan}')";
    $result = mysqli_query($conn, $sql);
    header('location: ind_toilet.php');
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Web Ceklist Toilet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body style="margin-top: 30px; background: url(t2.jpg)">
    <div class="container" style="background-color: #8B008B; width: 30%; border-radius:20px; padding: 30px;">
        <h1 style="color: #FFFFFF; text-align: center;">Tambah Data Toilet</h1>
        <div class="main">
            <form method="post" action="tam_toilet.php" enctype="multipart/form-data">
                <div class="input-group">
                    <span class="input-group-text">Kode Toilet</span>
                    <input class="form-control" type="text" name="toilet_id">
                </div>
                <div class="input">
                    <label style="color: #FFFFFF;">Lokasi</label>
                    <select class="form-select" aria-label="Default select example" name="lokasi">
                        <option value=""></option>
                        <option value="Line Produksi 2">Line Produksi 2</option>
                        <option value="Gedung A">Gedung A</option>
                        <option value="Gedung B">Gedung B</option>
                        <option value="Office Row Material">Office Row Material</option>
                        <option value="Office Finish Good">Office Finish Good</option>
                    </select>
                </div>
                <div class="input">
                    <label style="color: #FFFFFF;">Keterangan</label>
                    <select class="form-select" aria-label="Default select example" name="keterangan">
                        <option value=""></option>
                        <option value="Sudah">Sudah</option>
                        <option value="Belum">Belum</option>
                    </select>
                </div> <br>
                <input class= "btn" style="background-color: #2C74B3; color: #FFFFFF;" type="submit" name="submit" value="Simpan">
            </form>
        </div>
    </div>
</body>
</html>