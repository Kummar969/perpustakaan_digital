<?php
session_start();
include "../config/koneksi.php";
if (!isset($_SESSION['role']) || $_SESSION['role'] != "admin") {
    echo "Akses ditolak!";
    exit;
}
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM books WHERE id='$id'");
$buku = mysqli_fetch_assoc($data);
if ($buku && $buku['cover'] != "") {
    $path = "../uploads/cover/" . $buku['cover'];
    if (file_exists($path)) {
        unlink($path);
    }
}
mysqli_query($conn, "DELETE FROM books WHERE id='$id'");
header("Location: daftar_buku.php");
exit;
?>