<?php
session_start();
include "../config/koneksi.php";
if (!isset($_SESSION['siswa_id'])) {
    header("Location: ../auth/login.php");
    exit;
}
$user_id = $_SESSION['siswa_id'];
$book_id = $_GET['id'];
$buku = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM books WHERE id='$book_id'"));
if($buku['stok'] <= 0){
    echo "<script>alert('Stok buku habis');window.history.back();</script>";
    exit;
}
$tanggal_pinjam = date("Y-m-d");
$tanggal_kembali = date("Y-m-d", strtotime("+7 days"));
mysqli_query($conn," INSERT INTO borrowings (siswa_id, book_id, tanggal_pinjam, tanggal_kembali, status) VALUES ('$siswa_id','$book_id','$tanggal_pinjam','$tanggal_kembali','dipinjam') ");
mysqli_query($conn,"UPDATE books SET stok = stok - 1 WHERE id='$book_id'");
echo "<script>
alert('Buku berhasil dipinjam');
window.location='../siswa/dashboard_siswa.php';
</script>";
header("Location: ../siswa/riwayat_pinjam.php");
?>
<?php
session_start();
include "../config/koneksi.php";
if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit;
}
$user_id = $_SESSION['user_id'];
$book_id = $_GET['id']; ?>