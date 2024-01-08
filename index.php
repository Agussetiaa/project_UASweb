<?php
include("koneksi.php");

$q = "";
if (isset($_GET['submit']) && !empty($_GET['q'])) {
    $q = $_GET['q'];
    $sql_where = "WHERE tanggal LIKE '%" . $q . "%' or toilet_id LIKE '%" . $q . "%' or kloset LIKE '%" . $q . "%' or wastafel LIKE '%" . $q . "%' or lantai LIKE '%" . $q . "%' or dinding LIKE '%" . $q . "%' or sabun LIKE '%" . $q . "%' or bau LIKE '%" . $q . "%' or users_id LIKE '%" . $q . "%'";
}

$title = 'Checklist Toilet';
$sql = 'SELECT * FROM checklist ';
if (isset($sql_where))
    $sql .= $sql_where;

// Cek koneksi database
include("koneksi.php");

// Eksekusi query
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ceklist Toilet kel_10</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body style="margin-top: 30px; background-color: #000000; background: url(t2.jpg)">
    <div class="container" style="background-color: #FFFFFF; width: 250%; border-radius: 20px; padding: 10px;">
        <div class="head">
            <h1 style="color: #000000;">Checklist Toilet</h1>
            <form>
                <div class="form-group" action="index.php" method="get">
                    <label for="q" style="color: #000000;">CARI DATA TOILET</label>
                    <input type="text" placeholder="Masukkan Pencarian" id="q" name="q" class="input-q" value="<?php echo $q ?>">
                    <button type="submit" name="submit" class="btn btn-primary" style="width: 100px; height: 40px;">Cari</button>
                </div>
            </form>
        </div>
        <br>
        <div class="main">
            <?php
            // Tampilkan pesan jika tidak ada data
            if (mysqli_num_rows($result) == 0) {
                echo "<p>Belum ada data</p>";
            } else {
            ?>
                <table class="table table-striped table-hover" style="color: #000000; background-color: #FFFFFF;">
                    <tr>
                        <th style="color: #FFFFFF; background-color: #000000;">Tanggal</th>
                        <th style="color: #FFFFFF; background-color: #000000;">Kode Toilet</th>
                        <th style="color: #FFFFFF; background-color: #000000;">Kloset</th>
                        <th style="color: #FFFFFF; background-color: #000000;">Wastafel</th>
                        <th style="color: #FFFFFF; background-color: #000000;">Lantai</th>
                        <th style="color: #FFFFFF; background-color: #000000;">Dinding</th>
                        <th style="color: #FFFFFF; background-color: #000000;">Kaca</th>
                        <th style="color: #FFFFFF; background-color: #000000;">Bau</th>
                        <th style="color: #FFFFFF; background-color: #000000;">Sabun</th>
                        <th style="color: #FFFFFF; background-color: #000000;">Id Petugas</th>
                        <th style="color: #FFFFFF; background-color: #000000;">Aksi</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_array($result)) : ?>
                        <tr>
                            <td><?= $row['tanggal']; ?></td>
                            <td><?= $row['toilet_id']; ?></td>
                            <td><?= $row['kloset']; ?></td>
                            <td><?= $row['wastafel']; ?></td>
                            <td><?= $row['lantai']; ?></td>
                            <td><?= $row['dinding']; ?></td>
                            <td><?= $row['kaca']; ?></td>
                            <td><?= $row['bau']; ?></td>
                            <td><?= $row['sabun']; ?></td>
                            <td><?= $row['users_id']; ?></td>
                            <td>
                                <button class="btn" type="button" style="background-color: #09bcf3; width: 30%;"><a style="color: #FFFFFF;" href="ubah.php?id=<?= $row['id']; ?>">Ubah</a></button>
                                <button class="btn" type="button" style="background-color: #e4492e; width: 35%;"><a style="color: #FFFFFF;" href="hapus.php?id=<?= $row['id']; ?>">Hapus</a></button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            <?php } ?>
        </div>

        <div>
            <button class="btn" type="button" style="background-color: #07940e;"><a style="color: #FFFFFF" href="tambah.php">Tambah Data Checklist</a></button>
        </div><br>
        <div>
            <button class="btn" type="button" style="background-color: #07940e;"><a style="color: #FFFFFF" href="home.php">Kembali</a></button>
        </div>
    </div>
</body>

</html>
