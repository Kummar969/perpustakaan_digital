<?php
include "../config/koneksi.php";
$id = $_GET['id'];
$book_id = $_GET['book'];
mysqli_query($conn, "
UPDATE borrowings 
SET status='dikembalikan'
WHERE id='$id'
");
mysqli_query($conn, "
UPDATE books 
SET stok = stok + 1
WHERE id='$book_id'
");
header("Location: data_peminjaman.php");
?>