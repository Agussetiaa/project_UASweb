<?php
include("koneksi.php");

// Periksa apakah ID toilet telah diberikan sebagai parameter
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Lakukan query untuk mendapatkan data toilet berdasarkan ID
    $sql = "SELECT * FROM toilet WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    // Periksa apakah data ditemukan
    if ($result && $row = mysqli_fetch_array($result)) {
        $lokasiToilet = $row['lokasi'];
        $keteranganToilet = $row['keterangan'];

        // Jika formulir dikirimkan (method POST), proses pembaruan
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Ambil nilai yang dikirimkan melalui formulir
            $lokasiToiletBaru = $_POST['lokasi'];
            $keteranganToiletBaru = $_POST['keterangan'];

            // Lakukan query untuk memperbarui data toilet
            $sqlUpdate = "UPDATE toilet SET lokasi = '$lokasiToiletBaru', keterangan = '$keteranganToiletBaru' WHERE id = $id";
            $resultUpdate = mysqli_query($conn, $sqlUpdate);

            // Periksa apakah pembaruan berhasil
            if ($resultUpdate) {
                // Data Toilet berhasil diperbarui
                header('location: ind_toilet.php');
                exit(); // Pastikan untuk keluar setelah menggunakan header('location')
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ubah Data Toilet</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body style="margin-top: 30px; background: url(t2.jpg)">
    <div class="container" class="container" style="background-color: #8B008B; width: 50%; border-radius: 20px; padding: 30px;">
        <h1 style="color: #FFFFFF;">Ubah Data Toilet</h1>
        <form method="post">
            <div class="form-group">
                <label for="lokasi" style="color: #FFFFFF;">Lokasi Toilet</label>
                <input type="text" id="lokasi" name="lokasi" class="form-control" value="<?= $lokasiToilet ?>" required>
            </div>
            <div class="form-group">
                <label for="keterangan" style="color: #FFFFFF;">Keterangan</label>
                <textarea id="keterangan" name="keterangan" class="form-control" required><?= $keteranganToilet ?></textarea>
            </div><br>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>
<?php
    } else {
        echo "Data Toilet tidak ditemukan.";
    }
} else {
    echo "ID Toilet tidak diberikan.";
}
?>
