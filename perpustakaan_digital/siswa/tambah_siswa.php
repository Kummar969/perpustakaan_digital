<?php
session_start();
include "../config/koneksi.php";

if($_SESSION['role'] != "admin"){
    echo "Akses ditolak!";
    exit;
}
?>
<style>
.form-siswa input {
    width: 100%;
    padding: 10px 300px 10px 10px;
    margin-bottom: 12px;
    border-radius: 8px;
    border: 1px solid rgba(0,0,0,0.2);
    background: rgba(255,255,255,0.1);
    color: var(--text-tambah-buku);
    color: black;
}
.form-siswa button {
    background: #106064;
    color: white;
    padding: 15px 15px 15px 15px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.3s ease;
    text-align: justify;
}
</style>
<link rel="stylesheet" href="../assets/css/admin.css">
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
</div> </div>
        <div class="main">
            <div class="page-content">
                    <div class="topbar"> <h2>Tambah Siswa</h2> </div>
                        <form action="proses_tambah_siswa.php" method="POST" class="form-siswa">
                            <input type="text" name="nisn" placeholder="NISN / NIS" class="form-control" required>
                            <input type="text" name="nama" placeholder="Nama Siswa" class="form-control" required>
                            <input type="text" name="kelas" placeholder="Kelas" class="form-control" required>
                            <input type="text" name="password" placeholder="Password" class="form-control" required>
                                <button type="submit" class="btn-simpan-siswa">Simpan Data Siswa</button>
                        </form>
                    </div>
                </div>