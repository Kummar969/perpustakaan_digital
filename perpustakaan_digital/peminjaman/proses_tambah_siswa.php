<?php
include "../config/koneksi.php";
$nisn = $_POST['nisn'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$password = $_POST['password'];
mysqli_query($conn,"INSERT INTO users (nisn,nama,kelas,password,role)
VALUES ('$nisn','$nama','$kelas','$password','siswa')");
header("Location: data_siswa.php");
?>