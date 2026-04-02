<?php
session_start();
include "../config/koneksi.php";
if (!isset($_SESSION['siswa_id'])) {
    header("Location: ../auth/login.php");
    exit;
}
$siswa_id = $_SESSION['siswa_id'];
$book_id = $_GET['id'];
$tanggal_pinjam = date("Y-m-d");
$tanggal_kembali = date("Y-m-d", strtotime("+7 days"));
mysqli_query($conn, "
INSERT INTO borrowings 
(siswa_id, book_id, tanggal_pinjam, tanggal_kembali, status)
VALUES 
('$siswa_id', '$book_id', '$tanggal_pinjam', '$tanggal_kembali', 'dipinjam')
");
mysqli_query($conn, "
UPDATE books SET stok = stok - 1 WHERE id='$book_id'
");
header("Location: ../siswa/riwayat_pinjam.php");
exit;
?>