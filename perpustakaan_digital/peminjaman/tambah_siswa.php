<?php
session_start();
include "../config/koneksi.php";
?>
<title>Tambah Siswa</title>
<link rel="stylesheet" href="../assets/css/admin0.css">
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
<h2>Tambah Siswa</h2>
<form action="proses_tambah_siswa.php" method="POST" class="form-modern">
<input type="text" name="nisn" placeholder="NISN / NIS" required>
<input type="text" name="nama" placeholder="Nama Siswa" required>
<input type="text" name="kelas" placeholder="Kelas (contoh: X RPL 1 )" required>
<input type="password" name="password" placeholder="Password" required>
<button type="submit" class="btn-buku">
Simpan Data Siswa
</button>
</form>
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