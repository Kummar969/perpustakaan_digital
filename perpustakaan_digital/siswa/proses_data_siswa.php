<?php
include "../config/koneksi.php";
$nisn = $_POST['nisn'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$password = md5($_POST['password']);
mysqli_query($conn, "INSERT INTO siswa (nisn,nama,kelas,password)
VALUES ('$nisn','$nama','$kelas','$password')");
header("Location: ../siswa/data_siswa.php");