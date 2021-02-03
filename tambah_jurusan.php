<?php
    include 'database.php';
    $db = new Database();

    if(isset($_POST['tambah_j'])){
        if($db->add_jurusan($_POST['nama'])){
            header('Location: jurusan.php');
        } 
    }

    if(isset($_POST['update_j'])){
        if($db->update_jurusan($_GET['id'], $_POST['nama'])){
            header('Location: jurusan.php');
        } 
    }

    $nama_jurusan="";

    if(isset($_GET['update'])){
        $data = $db->get_byid('jurusan', $_GET['update']);
        $nama_jurusan= $data['nama_jurusan'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah</title>
</head>
<body>
    <h1>Tambah Jurusan</h1>
    <button type="submit" ><a href="jurusan.php">Kembali</a></button><br><br>
    <form action="<?= isset($_GET['update']) ? '?id=' .$_GET['update'] : '' ?>" method="POST">
    <table>
    <tr>
        <td>Jurusan</td>
        <td> : </td>
        <td><input type="text" name="nama" placeholder="Masukan Nama Jurusan" value="<?= $nama_jurusan ?>" require></td>
    </tr>
    <tr>
        <td> <br> <button type="submit" name="<?= isset($_GET['update']) ? 'update_j' : 'tambah_j' ?>" ><?= isset($_GET['update']) ? 'Update' : 'Tambah' ?></button></td>
    </tr>
    </table>
    </form>
</body>
</html>