<?php
session_start();
include "../config/koneksi.php";

$query = mysqli_query($conn,"SELECT * FROM siswa");
?>
<title>Data Siswa</title>
<link rel="stylesheet" href="../assets/css/admin0.css">
<link rel="stylesheet" href="../assets/css/halaman_siswa.css">

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
    
    <a href="../auth/logout_siswa.php" class="btn-logout">Logout</a>
</div></div>

    <!-- Main Content -->
        <div class="main">
            <div class="page-content">
                    <div class="topbar"> <h2>Data Siswa</h2> </div>
<a href="tambah_siswa.php" class="btn-tambah-siswa">
+ Tambah Siswa
</a>

<table class="table-siswa">

<tr>
<th>NISN / NIS</th>
<th>Nama</th>
<th>Kelas</th>
<th>Aksi</th>
</tr>

<?php while($data = mysqli_fetch_assoc($query)){ ?>

<tr>

<td><?php echo $data['nisn']; ?></td>
<td><?php echo $data['nama']; ?></td>
<td><?php echo $data['kelas']; ?></td>

<td>
<a href="hapus_siswa.php?id=<?php echo $data['id']; ?>" 
class="btn-hapus-siswa"
onclick="return confirm('Yakin ingin menghapus siswa ini?')">
Hapus
</a>
</td>

</tr>

<?php } ?>

</table>
            </div></div>

<script>
    
</script>
