<?php
    include 'database.php';
    $db = new Database();

    if(isset($_GET['hapus'])){
        if($db->del_mhs($_GET['hapus'])){
            header('Location: index.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>

<body>
    <div class="container">
        <h1>Data Mahasiswa</h1>
        <button type="submit" ><a href="tambah.php">Tambah</a></button>
        <button type="submit" ><a href="jurusan.php">Lihat Jurusan</a></button> <br><br>
        <table rules="all" border="1">
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
            <?php 
            $i = 1;
            foreach($db->ambil_mhs() as $x) { ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $x['nim'] ?></td>
                <td><?= $x['nama'] ?></td>
                <td><?= $x['jurusan'] ?></td>
                <td>
                    <a href="nilai.php?id=<?= $x['id'] ?>">Lihat Nilai</a>
                    |
                    <a href="?hapus=<?= $x['id'] ?>">Hapus</a>
                    |
                    <a href="tambah.php?update=<?= $x['id'] ?>">Update</a>
                </td>
            </tr>
            <?php $i++; } ?>
        </table>
    </div>
</body>

</html>