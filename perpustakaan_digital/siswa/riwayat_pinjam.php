<?php
session_start();
include "../config/koneksi.php";
if (!isset($_SESSION['siswa_id'])) {
    header("Location: ../auth/login.php");
    exit;
}
$siswa_id = $_SESSION['siswa_id'];
$querySiswa = mysqli_query($conn, "SELECT * FROM siswa WHERE id='$siswa_id'");
$siswa = mysqli_fetch_assoc($querySiswa);
$nama = $siswa['nama'];
$riwayat = mysqli_query($conn,"SELECT
    books.judul,
    books.penulis,
    books.cover,
    borrowings.tanggal_pinjam,
    borrowings.tanggal_kembali,
    borrowings.status
FROM borrowings
JOIN books ON borrowings.book_id = books.id
WHERE borrowings.siswa_id='$siswa_id'
ORDER BY borrowings.id DESC
");
?>
<!DOCTYPE html>
<html>
<head>

<title>Riwayat Peminjaman - SMKS Sinar Husni</title>
<link rel="stylesheet" href="../assets/css/riwayat_peminjaman_siswa.css">
</head>
    <body>
        <div class="sidebar">
            <h2 class="logo">📚 Perpustakaan</h2>
                <a href="dashboard_siswa.php">🏠 Dashboard</a>
                <a href="buku_siswa.php">📖 Cari Buku</a>
                <a href="riwayat_pinjam.php">📋 Riwayat</a>
                <a href="../auth/logout_siswa.php" class="logout">Logout</a>
        </div>

        <div class="main">
            <div class="topbar">
                <h2>📚 Riwayat Peminjaman</h2>
            </div>
                <div class="content">
                    <div class="book-grid">
                        <?php while($row = mysqli_fetch_assoc($riwayat)) { ?>
                    <div class="book-card">
                        <img src="../uploads/cover/<?php echo $row['cover']; ?>" class="cover">
                    <div class="book-info">
                        <h3 class="judul"> <?php echo $row['judul']; ?> </h3>
                        <p class="penulis"> ✍ <?php echo $row['penulis']; ?> </p>
                        <p class="tanggal"> 📅 Pinjam : <?php echo $row['tanggal_pinjam']; ?> </p>
                        <p class="tanggal"> 📅 Kembali : <?php echo $row['tanggal_kembali']; ?> </p>
                    <span class="status 
                        <?php echo $row['status'] == 'dipinjam' ? 'status-pinjam' : 'status-kembali'; ?>">
                        <?php echo $row['status']; ?>
                    </span> </div> </div> <?php } ?> </div> </div> </body> </html>