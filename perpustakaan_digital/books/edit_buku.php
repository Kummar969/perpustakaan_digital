<?php
include "../config/koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM books WHERE id='$id'");
$buku = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Buku</title>
<link rel="stylesheet" href="../assets/css/admin0.css">
</head>

<body>
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
<div class="topbar">
<h2>Edit Buku</h2>
</div>
<form action="update_buku.php" method="POST" enctype="multipart/form-data" class="form-modern">

<input type="hidden" name="id" value="<?php echo $buku['id']; ?>">

<label>Judul Buku</label>
<input type="text" name="judul" value="<?php echo $buku['judul']; ?>" required>

<label>Penulis</label>
<input type="text" name="penulis" value="<?php echo $buku['penulis']; ?>" required>

<label>Kategori</label>
<select name="kategori">
<option <?php if($buku['kategori']=="Pelajaran") echo "selected"; ?>>Pelajaran</option>
<option <?php if($buku['kategori']=="Novel") echo "selected"; ?>>Novel</option>
<option <?php if($buku['kategori']=="Komik") echo "selected"; ?>>Komik</option>
<option <?php if($buku['kategori']=="Teknologi") echo "selected"; ?>>Teknologi</option>
</select>

<label>Jumlah Halaman</label>
<input type="number" name="halaman" value="<?php echo $buku['halaman']; ?>">

<label>Stok Buku</label>
<input type="number" name="stok" value="<?php echo $buku['stok']; ?>" id="editStok">

<label>Tahun Terbit</label>
<input type="number" name="tahun_terbit" value="<?php echo $buku['tahun_terbit']; ?>">

<label>Penerbit</label>
<input type="text" name="penerbit" value="<?php echo $buku['penerbit']; ?>">

<label>Deskripsi</label>
<textarea name="deskripsi"><?php echo $buku['deskripsi']; ?></textarea>

<label>Cover Buku (opsional)</label>
<input type="file" name="cover">

<button type="submit" class="btn-simpan">Update Buku</button>

</form>

</div>
</div>

</body>
</html>