<?php
session_start();
include "../config/koneksi.php";
$nisn = $_POST['nisn'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$password = ($_POST['password']);
$cek = mysqli_query($conn, "SELECT * FROM siswa WHERE nisn='$nisn'");
    
if(mysqli_num_rows($cek) > 0){
    echo "<script>
    alert('NISN sudah terdaftar!');
    window.location='../siswa/tambah_siswa.php';
    </script>";
}else{
    mysqli_query($conn,"INSERT INTO siswa (nisn,nama,kelas,password)
    VALUES ('$nisn','$nama','$kelas','$password')");
    echo "<script>
    alert('Data siswa berhasil ditambahkan');
    window.location='../siswa/data_siswa.php';
    </script>";
}
?>