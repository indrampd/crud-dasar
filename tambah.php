<?php
    include 'database.php';
    $db = new Database();

    $jurusan = $db->ambil_jurusan();
    if(isset($_POST['tambah_m'])){
        if($db->add_mhs($_POST['nim'],$_POST['nama'],$_POST['jurusan'])){
            header('Location: index.php');
        } 
    }

    if(isset($_POST['update_m'])){
        if($db->update_mhs($_GET['id'], $_POST['nim'],$_POST['nama'],$_POST['jurusan'])){
            header('Location: index.php');
        } 
    }

    $nama="";
    $nim="";
    $_jurusan="";

    if(isset($_GET['update'])){
        $data = $db->get_byid('mahasiswa', $_GET['update']);
        $nama= $data['nama'];
        $nim= $data['nim'];
        $_jurusan= $data['jurusan'];
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
    <h1>Tambah Mahasiswa</h1>
    <button type="submit" ><a href="index.php">Kembali</a></button> <br><br>
    <form action="<?= isset($_GET['update']) ? '?id=' .$_GET['update'] : '' ?>" method="POST">
        <table>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama" placeholder="Masukan Nama" value="<?= $nama ?>" require></td>
        </tr>
        <tr>
            <td>NIM</td>
            <td><input type="text" name="nim" placeholder="Masukan NIM" value="<?= $nim ?>" require></td>
        </tr>
        <tr>
            <td>Jurusan</td>
            <td><select name="jurusan" require>
                    <?php foreach($jurusan as $j) : ?>
                    <option <?= $_jurusan == $j['nama_jurusan'] ? 'selected' : ''  ?> value="<?= $j['nama_jurusan'] ?>">
                        <?= $j['nama_jurusan'] ?></option>
                    <?php endforeach ?>
                </select></td>
        </tr>
        <tr>
            <td><br><button type="submit" name="<?= isset($_GET['update']) ? 'update_m' : 'tambah_m' ?>" ><?= isset($_GET['update']) ? 'Update' : 'Tambah' ?></button>
            </td>
        </tr>
        </table>
    </form>
</body>

</html>