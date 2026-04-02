<?php
session_start();
include "../config/koneksi.php";
?>

<link rel="stylesheet" href="../assets/css/admin0.css">
<title>Tambah Buku - Perpustakaan</title>
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
<div class="topbar">
<h2>Tambah Buku</h2>
    </div>
<form action="proses_tambah_buku.php" method="POST" enctype="multipart/form-data" class="form-modern">
<input type="text" name="judul" placeholder="Judul Buku" class="form-control" required>
<input type="text" name="penulis" placeholder="Penulis" class="form-control" required>

<select name="kategori" class="form-control" required>
    <option value="">-- Pilih Kategori --</option>
    <option value="Novel">Novel</option>
    <option value="Pendidikan">Pendidikan</option>
    <option value="Teknologi">Teknologi</option>
    <option value="Sejarah">Sejarah</option>
    <option value="Finansial">Finansial / Keuangan</option>
    <option value="Pemikiran">Pemikiran</option>
    <option value="Komik">Komik</option>
    <option value="Lainnya">Lainnya</option>
</select>

<input type="number" name="halaman" placeholder="Jumlah Halaman" class="form-control" required>
<input type="number" name="tahun_terbit" placeholder="Tahun Terbit" class="form-control" required>
<input type="text" name="penerbit" placeholder="Penerbit" class="form-control" required>
<textarea name="deskripsi" placeholder="Deskripsi Buku" class="form-control"></textarea>
<input type="number" name="stok" placeholder="Stok Buku" class="form-control" required>
<input type="file" name="cover" class="form-control" required>
<button type="submit" class="btn-buku">Simpan Buku</button>
</form>
</div> </div>
<script src="../assets/js/theme.js"></script>
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