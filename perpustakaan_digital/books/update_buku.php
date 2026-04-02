<?php
include "../config/koneksi.php";
$id = $_POST['id'];
$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$kategori = $_POST['kategori'];
$halaman = $_POST['halaman'];
$stok = $_POST['stok']; 
$tahun = $_POST['tahun_terbit'];
$penerbit = $_POST['penerbit'];
$deskripsi = $_POST['deskripsi'];
    if($_FILES['cover']['name'] != ""){
        $cover = $_FILES['cover']['name'];
        $tmp = $_FILES['cover']['tmp_name'];
    move_uploaded_file($tmp, "../uploads/cover/".$cover);
mysqli_query($conn, "UPDATE books SET
    judul='$judul',
    penulis='$penulis',
    kategori='$kategori',
    halaman='$halaman',
    stok='$stok',
    tahun_terbit='$tahun',
    penerbit='$penerbit',
    deskripsi='$deskripsi',
    cover='$cover'
    WHERE id='$id'
");
} else {
mysqli_query($conn, "UPDATE books SET
    judul='$judul',
    penulis='$penulis',
    kategori='$kategori',
    halaman='$halaman',
    stok='$stok',
    tahun_terbit='$tahun',
    penerbit='$penerbit',
    deskripsi='$deskripsi'
    WHERE id='$id'
");
}
header("Location: daftar_buku.php");
?>