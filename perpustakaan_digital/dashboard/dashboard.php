<?php
session_start();

if(!isset($_SESSION['admin_id'])){
    header("Location: ../auth/login_admin.php");
    exit;
}
?>

<?php
include "../config/koneksi.php";

$total_buku = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM books"))['total'];

$buku_dipinjam = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM borrowings WHERE status='dipinjam'"))['total'];

$total_peminjaman = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM borrowings"))['total'];

$buku_tersedia = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(stok) as total FROM books"))['total'];
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Dashboard Perpustakaan</title>
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

<!-- Main Content -->
<div class="main">
    <div class="page-content">
        <div class="topbar">
            <h1>Halo, Selamat datang <?php echo $_SESSION['username']; ?>👋</h1>
                <div class="clock">
                    <span id="jam"></span>
                    <br><span id="tanggal"></span>
                </div>
        </div>
    <div class="cards">
        <div class="card">
            <h3>Total Buku</h3>
            <p><?php echo $total_buku; ?></p>
        </div>

        <div class="card">
            <h3>Buku Dipinjam</h3>
            <p><?php echo $buku_dipinjam; ?></p>
        </div>

        <div class="card">
            <h3>Buku Tersedia</h3>
            <p><?php echo $buku_tersedia; ?></p>
        </div>

        <div class="card">
            <h3>Total Peminjaman</h3>
            <p><?php echo $total_peminjaman; ?></p>
        </div>

    </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
    const toggle = document.getElementById("themeToggle");

    /* Load theme dari browser */
    const savedTheme = localStorage.getItem("theme");
    if (savedTheme === "dark") {
        document.body.classList.add("dark-mode");
    }

    toggle.addEventListener("click", () => {
        document.body.classList.toggle("dark-mode");

        if (document.body.classList.contains("dark-mode")) {
            localStorage.setItem("theme", "dark");
        } else {
            localStorage.setItem("theme", "light");
        }
    });
});



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

/* JAM REALTIME */
    function updateClock(){
    const now = new Date();
    const jam = now.toLocaleTimeString("id-ID");
    const tanggal = now.toLocaleDateString("id-ID",{ weekday:'long', year:'numeric', month:'long', day:'numeric' });

    document.getElementById("jam").innerText = jam;
    document.getElementById("tanggal").innerText = tanggal;
}

    setInterval(updateClock,1000);
    updateClock();
</script>

</body>
</html>