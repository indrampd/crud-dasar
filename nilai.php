<?php
    include 'database.php';
    $db = new Database();

    $nilai = $db->ambil_nilai($_GET['id']);
    if(isset($_GET['hapus'])){
        if($db->del_nilai($_GET['hapus'])){
            header('Location: nilai.php?id=' . $_GET['id_mhs']);
        }
    }

    $mhs = $db->get_byid('mahasiswa', $_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Nilai</title>
</head>
<body>
<h1>DATA NILAI</h1>
<table>
    <tr>
        <td>Nama</td>
        <td> : </td>
        <td><span><?= $mhs['nama'] ?></span></td>
    </tr>
    <tr>
        <td>NIM</td>
        <td> : </td>
        <td><span><?= $mhs['nim'] ?></span></td>
    </tr>
    <tr>
        <td>Jurusan</td>
        <td> : </td>
        <td><span><?= $mhs['jurusan'] ?></span></td>
    </tr>
</table>
<br>
    <button type="submit" ><a href="index.php">Kembali</a></button>
    <button type="submit" ><a href="tambah_nilai.php?id_m=<?= $_GET['id'] ?>">Tambah</a></button>
    <br><br>
    <table rules="all" border="1">
        <tr>
            <th>No</th>
            <th>Mata Kuliah</th>
            <th>Nilai</th>
            <th>Semester</th>
            <th>Aksi</th>
        </tr>
        <?php 
        $i = 1;
        foreach($nilai as $n) { ?>
        <tr>
            <td><?= $i ?></td>
            <td><?= $n['nama_matkul'] ?></td>
            <td><?= $n['nilai'] ?></td>
            <td><?= $n['semester'] ?></td>
            <td>
                <a href="?hapus=<?= $n['id'] ?>&id_mhs=<?= $_GET['id'] ?>">Hapus</a>
                |
                <a href="tambah_nilai.php?update=<?= $n['id'] ?>&id_m=<?= $_GET['id'] ?>">Update</a>
            </td>
        </tr>
        <?php $i++; } ?>
    </table>
</body>
</html>