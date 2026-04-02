<?php
session_start();
include "../config/koneksi.php";

$query = mysqli_query($conn, "SELECT * FROM users WHERE role='siswa'");
?>

<title>Data Siswa</title>
<link rel="stylesheet" href="../assets/css/admin0.css">
<link rel="stylesheet" href="../assets/css/data_siswa.css">

<!-- Sidebar -->
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

<h1>Data Siswa</h1>

<div class="table-container">

<table class="table-modern" border="1">
<tr>
    <th>NISN / NIS</th>
    <th>Nama</th>
    <th>Kelas</th>
    <th>Aksi</th>
</tr>

<?php while($siswa = mysqli_fetch_assoc($query)) { ?>
<tr>
    <td><?php echo $siswa['nisn']; ?></td>
    <td><?php echo $siswa['nama']; ?></td>
    <td><?php echo $siswa['kelas']; ?></td>
    <td>
        <a href="hapus_siswa.php?id=<?php echo $siswa['id']; ?>" class="btn-hapus">Hapus</a>
    </td>
</tr>
<?php } ?>

</table>
<a href="tambah_siswa.php" class="btn-tambah-siswa">
➕ Tambah Siswa
</a>
</div>

</div>
</div>