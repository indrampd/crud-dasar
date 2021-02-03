<?php
    include 'database.php';
    $db = new Database();

    $jurusan = $db->ambil_jurusan();
    if(isset($_POST['tambah_n'])){
        if($db->add_nilai($_GET['id_m'], $_POST['nama_matkul'], $_POST['nilai'], $_POST['semester'])){
            header('Location: nilai.php?id=' . $_GET['id_m']);
        } 
    }

    if(isset($_POST['update_n'])){
        if($db->update_nilai($_GET['id'], $_GET['id_m'], $_POST['nama_matkul'], $_POST['nilai'], $_POST['semester'])){
            header('Location: nilai.php?id=' . $_GET['id_m']);
        } 
    }

    $nama_mk="";
    $nilai="";
    $semester="";

    if(isset($_GET['update'])){
        $data = $db->get_byid('nilai', $_GET['update']);
        $nama_mk= $data['nama_matkul'];
        $nilai= $data['nilai'];
        $semester= $data['semester'];
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
    <h1>Tambah Nilai</h1>
    <button type="submit" ><a href="nilai.php?id=<?= $_GET['id_m'] ?>">Kembali</a></button><br><br>
    <form action="<?= isset($_GET['update']) ? '?id=' .$_GET['update'] . '&id_m=' .$_GET['id_m'] : '?id_m=' .$_GET['id_m'] ?>" method="POST">
    <table>
    <tr>
        <td>Mata Kuliah </td>
        <td> <input type="text" name="nama_matkul" placeholder="Masukan Nama Mata Kuliah" value="<?= $nama_mk ?>"
                require></td>
    </tr>
    <tr>
        <td>Nilai </td>
        <td><select name="nilai" require>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
            </select></td>
    </tr>
    <tr>
        <td>Semester </td>
        <td><select name="semester" require>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
            </select></td>
    </tr>
    <tr>
        <td><br><button type="submit" name="<?= isset($_GET['update']) ? 'update_n' : 'tambah_n' ?>" ><?= isset($_GET['update']) ? 'Update' : 'Tambah' ?></button>
        </td>
        </tr>
        </table>
    </form>
</body>
</html>