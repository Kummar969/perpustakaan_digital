<?php
session_start();
include "../config/koneksi.php";
if (!isset($_SESSION['siswa_id'])) {
    header("Location: ../auth/login.php");
    exit;
}
$siswa_id = $_SESSION['siswa_id'];
$nama = $_SESSION['nama'];
    $cari = "";
        if(isset($_GET['cari'])){ $cari = $_GET['cari']; $query = mysqli_query($conn," SELECT * FROM books WHERE judul LIKE '%$cari%' OR penulis LIKE '%$cari%'OR kategori LIKE '%$cari%'   ");
    }else{
        $query = mysqli_query($conn,"SELECT * FROM books ORDER BY id DESC");
    }
?>

<!DOCTYPE html>
    <html>
        <head>
            <title>Cari Buku - SMKS Sinar Husni</title>
            <link rel="stylesheet" href="../assets/css/buku_siswa.css">
            <link rel="stylesheet" href="../assets/css/tambahan_dashboard_siswa.css">
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
                <h2>📘 Cari Buku</h2>
                    <form method="GET" class="search-box">
                        <input type="text" name="cari" placeholder="Cari judul, penulis atau kategori..." value="<?php echo $cari; ?>">
                    <button type="submit">🔍</button>
                </form>
            </div>

            <div class="books">
                <?php while($buku = mysqli_fetch_assoc($query)){ ?>
                    <div class="book-card">
                        <img src="../uploads/cover/<?php echo $buku['cover']; ?>">
    
                        <div class="book-content">
                            <h3 class="judul"><?php echo $buku['judul']; ?></h3>
                            <p class="penulis"><?php echo $buku['penulis']; ?></p>
                            <p class="kategori"><?php echo $buku['kategori']; ?></p>
                        </div>

                        <div class="book-footer">
                            <p class="stok">Stok: <?php echo $buku['stok']; ?></p>
                                <?php if($buku['stok'] > 0){ ?>
                            <a href="../peminjaman/pinjam.php?id=<?php echo $buku['id']; ?>" class="btn-pinjam"> Pinjam Buku </a>
                        <?php } else { ?>
                    <span class="habis">Stok Habis</span>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</div>
</div>  
</body>
</html>