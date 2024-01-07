<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'koneksi.php';

$message = ""; // Pesan awal

if (isset($_POST['submit'])) {
    $tanggal = mysqli_real_escape_string($conn, $_POST['tanggal']);
    $toilet_id = mysqli_real_escape_string($conn, $_POST['toilet_id']);
    $kloset = mysqli_real_escape_string($conn, $_POST['kloset']);
    $wastafel = mysqli_real_escape_string($conn, $_POST['wastafel']);
    $lantai = mysqli_real_escape_string($conn, $_POST['lantai']);
    $dinding = mysqli_real_escape_string($conn, $_POST['dinding']);
    $kaca = mysqli_real_escape_string($conn, $_POST['kaca']);
    $bau = mysqli_real_escape_string($conn, $_POST['bau']);
    $sabun = mysqli_real_escape_string($conn, $_POST['sabun']);
    $users_id = mysqli_real_escape_string($conn, $_POST['users_id']);

    // Validasi form, pastikan semua field terisi
    if (empty($tanggal) || empty($toilet_id) || empty($kloset) || empty($wastafel) || empty($lantai) || empty($dinding) || empty($kaca) || empty($bau) || empty($sabun) || empty($users_id)) {
        $message = "Semua field harus diisi";
    } else {
        $sql = "INSERT INTO checklist (tanggal, toilet_id, kloset, wastafel, lantai, dinding, kaca, bau, sabun, users_id) ";
        $sql .= "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssssssssss", $tanggal, $toilet_id, $kloset, $wastafel, $lantai, $dinding, $kaca, $bau, $sabun, $users_id);
            $result = mysqli_stmt_execute($stmt);

            if (!$result) {
                $message = "Query gagal: " . mysqli_error($conn);
            } else {
                $message = "Data berhasil disimpan";
                // Pindahkan pengalihan header ke setelah penanganan error
                header('location: index.php');
            }

            mysqli_stmt_close($stmt);
        } else {
            $message = "Pernyataan persiapan gagal: " . mysqli_error($conn);
        }
    }
}
?>
<!-- ... Bagian HTML tetap sama ... -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body style="margin-top: 30px; background-color: #0A2647; background: url(t2.jpg)">
    <div class="container" style="background-color: #91C8E4; width: 30%; padding: 30px; border-radius: 20px">
        <h1 style="color: #000000; text-align: center;">Tambah Data</h1>
        <div class="main">
            <form method="post" action="tambah.php" enctype="multipart/form-data">
                <div class="input-group">
                    <span class="input-group-text">Tanggal</span>
                    <input class="form-control" type="date" name="tanggal" data-date-format="DD/MMM/YYYY" placeholder="dd/mm/yyyy">
                </div><br>
                <div class="input-group">
                    <span class="input-group-text">Kode Toilet</span>
                    <input class="form-control" type="text" name="toilet_id">
                </div><br>
                <div class="input-group">
                    <span class="input-group-text">Kode Petugas</span>
                    <input class="form-control" type="text" name="users_id">
                </div>  
                <div class="input">
                    <label style="color: #000000;">Kloset</label>
                    <select class="form-select" aria-label="Default select example" name="kloset">
                        <option value=""></option>
                        <option value="Bersih">Bersih</option>
                        <option value="Kotor">Kotor</option>
                        <option value="Rusak">Rusak</option>
                    </select>
                </div>
                <div class="input">
                    <label style="color: #000000;">Wastafel</label>
                    <select class="form-select" aria-label="Default select example" name="wastafel">
                        <option value=""></option>
                        <option value="Bersih">Bersih</option>
                        <option value="Kotor">Kotor</option>
                        <option value="Rusak">Rusak</option>
                    </select>
                </div>
                <div class="input">
                    <label style="color: #000000;">Lantai</label>
                    <select class="form-select" aria-label="Default select example" name="lantai">
                        <option value=""></option>
                        <option value="Bersih">Bersih</option>
                        <option value="Kotor">Kotor</option>
                        <option value="Rusak">Rusak</option>
                    </select>
                </div>
                <div class="input">
                    <label style="color: #000000;">Dinding</label>
                    <select class="form-select" aria-label="Default select example" name="dinding">
                        <option value=""></option>
                        <option value="Bersih">Bersih</option>
                        <option value="Kotor">Kotor</option>
                        <option value="Rusak">Rusak</option>
                    </select>
                </div>
                <div class="input">
                    <label style="color: #000000;">Kaca</label>
                    <select class="form-select" aria-label="Default select example" name="kaca">
                        <option value=""></option>
                        <option value="Bersih">Bersih</option>
                        <option value="Kotor">Kotor</option>
                        <option value="Rusak">Rusak</option>
                    </select>
                </div>
                <div class="input">
                    <label style="color: #000000;">Bau</label>
                    <select class="form-select" aria-label="Default select example" name="bau">
                        <option value=""></option>
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                    </select>
                </div>
                <div class="input">
                    <label style="color: #000000;">Sabun</label>
                    <select class="form-select" aria-label="Default select example" name="sabun">
                        <option value=""></option>
                        <option value="Ada">Ada</option>
                        <option value="Habis">Habis</option>
                        <option value="Hilang">Hilang</option>
                    </select>
                </div><br>
                
                <div class="d-flex justify-content-center mt-2">
                <input class="btn" style="background-color: #7CFC00; color: #000000;" type="submit" name="submit" value="Simpan">
                </div>
            </form>
            <!-- Menampilkan pesan -->
            <?php if (!empty($message)): ?>
                <div class="alert alert-primary mt-3" role="alert">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>