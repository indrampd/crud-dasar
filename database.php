<?php
    class Database{
        var $host = 'localhost';
        var $user = 'root';
        var $pass = "";
        var $db = "kuliah";

        function __construct(){
            $con = mysqli_connect($this->host, $this->user, $this->pass);
            $this->conn = $con;
            mysqli_select_db($con, $this->db);
        }

        function isErr(){
            return mysqli_connect_errno();
        }

        function add_mhs($nim, $nama, $jurusan){
            $res = mysqli_query($this->conn, "INSERT INTO mahasiswa VALUES('','$nim', '$nama', '$jurusan')");
            if(mysqli_affected_rows($this->conn) > 0){
                return true;
            } else {
                return false;
            }
        }

        function del_mhs($id){
            $res = mysqli_query($this->conn, "DELETE FROM mahasiswa WHERE id='$id'");
            if(mysqli_affected_rows($this->conn) > 0){
                return true;
            } else {
                return false;
            }
        }

        function ambil_mhs(){
            $res = mysqli_query($this->conn, "SELECT * FROM mahasiswa");
            $data = [];
            while($d = mysqli_fetch_assoc($res)){
                $data[] = $d;
            }

            if($data){
                return $data;
            } else {
                return [];
            }
        }

        function update_mhs($id, $nim, $nama, $jurusan){
            $res = mysqli_query($this->conn, "UPDATE mahasiswa SET nim='$nim', nama='$nama', jurusan='$jurusan' WHERE id='$id'");
            var_dump($res);
            if(mysqli_affected_rows($this->conn) > 0){
                return true;
            } else {
                return false;
            }
        }

        function add_nilai($idmhs, $nmkul, $nilai, $smster){
            $res = mysqli_query($this->conn, "INSERT INTO nilai VALUES('','$idmhs', '$nmkul', '$nilai', '$smster')");
            if(mysqli_affected_rows($this->conn) > 0){
                return true;
            } else {
                return false;
            }
        }

        function del_nilai($id){
            $res = mysqli_query($this->conn, "DELETE FROM nilai WHERE id='$id'");
            if(mysqli_affected_rows($this->conn) > 0){
                return true;
            } else {
                return false;
            }
        }

        function ambil_nilai($idmhs){
            $res = mysqli_query($this->conn, "SELECT * FROM nilai WHERE id_mhs='$idmhs'");
            $data = [];
            while($d = mysqli_fetch_assoc($res)){
                $data[] = $d;
            }

            if($data){
                return $data;
            } else {
                return [];
            }
        }

        function update_nilai($id,$idmhs,  $nmkul, $nilai, $smster){
            $res = mysqli_query($this->conn, "UPDATE nilai SET id_mhs='$idmhs', nama_matkul='$nmkul', nilai='$nilai', semester='$smster' WHERE id='$id'");
            if(mysqli_affected_rows($this->conn) > 0){
                return true;
            } else {
                return false;
            }
        }

        function add_jurusan($nama_jurusan){
            $res = mysqli_query($this->conn, "INSERT INTO jurusan VALUES('','$nama_jurusan')");
            if(mysqli_affected_rows($this->conn) > 0){
                return true;
            } else {
                return false;
            }
        }

        function del_jurusan($id){
            $res = mysqli_query($this->conn, "DELETE FROM jurusan WHERE id='$id'");
            if(mysqli_affected_rows($this->conn) > 0){
                return true;
            } else {
                return false;
            }
        }

        function ambil_jurusan(){
            $res = mysqli_query($this->conn, "SELECT * FROM jurusan");
            $data = [];
            while($d = mysqli_fetch_assoc($res)){
                $data[] = $d;
            }

            if($data){
                return $data;
            } else {
                return [];
            }
        }

        function update_jurusan($id,$jurusan){
            $res = mysqli_query($this->conn, "UPDATE jurusan SET nama_jurusan='$jurusan' WHERE id='$id'");
            if(mysqli_affected_rows($this->conn) > 0){
                return true;
            } else {
                return false;
            }
        }

        function get_byid($tb, $id){
            $res = mysqli_query($this->conn, "SELECT * FROM $tb WHERE id='$id'");
            $data  = mysqli_fetch_assoc($res);
            if($data){
                return $data;
            } else {
                return [];
            }
        }
    }
?>