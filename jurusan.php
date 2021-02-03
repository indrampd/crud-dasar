<?php
    include 'database.php';
    $db = new Database();

    $jurusan = $db->ambil_jurusan();
    if(isset($_GET['hapus'])){
        if($db->del_jurusan($_GET['hapus'])){
            header('Location: jurusan.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Data Jurusan</h1>
    <button type="submit" ><a href="index.php">Kembali</a></button>
    <button type="submit" ><a href="tambah_jurusan.php">Tambah</a></button><br><br>
    <table rules="all" border="1">
        <tr>
            <th>No</th>
            <th>Nama Jurusan</th>
            <th>Aksi</th>
        </tr>
        <?php 
        $i = 1;
        foreach($db->ambil_jurusan() as $j) { ?>
        <tr>
            <td><?= $i ?></td>
            <td><?= $j['nama_jurusan'] ?></td>
            <td>
                <a href="tambah_jurusan.php?update=<?= $j['id'] ?>">Update</a>
                |
                <a href="?hapus=<?= $j['id'] ?>">Hapus</a>
            </td>
        </tr>
        <?php $i++; } ?>
    </table>
</body>

</html>