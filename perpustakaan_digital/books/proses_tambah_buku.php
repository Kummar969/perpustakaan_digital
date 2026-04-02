<?php
include "../config/koneksi.php";
$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$kategori = $_POST['kategori'];
$stok = $_POST['stok'];
$halaman = $_POST['halaman'];
$tahun = $_POST['tahun_terbit'];
$penerbit = $_POST['penerbit'];
$deskripsi = $_POST['deskripsi'];
$cover = $_FILES['cover']['name'];
$tmp = $_FILES['cover']['tmp_name'];
$path = "../uploads/cover/" . $cover;

move_uploaded_file($tmp, $path);
header("Location: daftar_buku.php");
mysqli_query($conn, "INSERT INTO books 
(judul, penulis, kategori, halaman, tahun_terbit, penerbit, deskripsi, stok, cover)
VALUES 
('$judul','$penulis','$kategori','$halaman','$tahun','$penerbit','$deskripsi','$stok','$cover')");
?>