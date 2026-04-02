<?php
session_start();
include "../config/koneksi.php";
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../auth/login_admin.php");
    exit;
}
$data = mysqli_query($conn,"
SELECT
    borrowings.id,
    siswa.nama,
    books.judul,
    borrowings.tanggal_pinjam,
    borrowings.tanggal_kembali,
    borrowings.status,
    books.id as book_id
FROM borrowings
JOIN siswa ON borrowings.siswa_id = siswa.id
JOIN books ON borrowings.book_id = books.id
ORDER BY borrowings.id DESC
");
?>
<title>Riwayat Peminjaman Buku</title>
<link rel="stylesheet" href="../assets/css/admin0.css">
<link rel="stylesheet" href="../assets/css/data_siswa.css">

<div class="sidebar">
    <h2 class="logo">📚 Perpustakaan SMKS Sinar Husni</h2>
    <div class="bungkus">
        <a href="../dashboard/dashboard.php" class="menu-bar">🏠 Dashboard</a>
        <a href="../books/daftar_buku.php" class="menu-bar">📖 Daftar Buku</a>
        <a href="../books/tambah_buku.php" class="menu-bar">➕ Tambah Buku</a>
        <a href="../peminjaman/data_peminjaman.php" class="menu-bar">📋 Peminjaman</a>
        <a href="../siswa/data_siswa.php" class="menu-bar">👥 Data Siswa</a>
        <div class="theme-toggle" id="themeToggle">
        <div class="toggle-circle"></div>
        <span class="toggle-text"></span>
    </div>
    <a href="../auth/logout.php" class="btn-logout">Logout</a>
</div>
</div>

    <div class="main">
        <div class="page-content">
        <h2>Data Peminjaman Buku</h2>
            <table border="1" cellpadding="10">
                <tr>
                    <th>Nama Siswa</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            <?php while($row = mysqli_fetch_assoc($data)) { ?>
            <tr>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['judul']; ?></td>
                <td><?php echo $row['tanggal_pinjam']; ?></td>
                <td><?php echo $row['tanggal_kembali']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td>
                    <?php if($row['status']=="dipinjam"){ ?>
                    <a href="kembalikan.php?id=<?php echo $row['id']; ?>&book=<?php echo $row['book_id']; ?>"> Kembalikan </a>
                    <?php } else { ?> Selesai <?php } ?>
                </td>
            </tr>
        <?php } ?>
        </table>
    </div>
</div>
<script>
    document.querySelectorAll(".sidebar a").forEach(link => {
    link.addEventListener("click", function(e) {
        e.preventDefault();
        const url = this.href;
        document.querySelector(".page-content").classList.add("fade-out");
        setTimeout(() => {
            window.location.href = url;
        }, 250);
    });
});
</script>
</body>
</html>