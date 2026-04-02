<?php
session_start();
include "../config/koneksi.php";

/* cek login */
if (!isset($_SESSION['siswa_id'])) {
    header("Location: ../auth/login.php");
    exit;
}

$siswa_id = $_SESSION['siswa_id'];
$data = mysqli_fetch_assoc(mysqli_query($conn," SELECT nama FROM siswa WHERE id='$siswa_id' "));
$nama = $data['nama'];
$queryPinjam = " SELECT COUNT(*) as total FROM borrowings WHERE siswa_id='$siswa_id' AND status='dipinjam' ";
$pinjam = mysqli_fetch_assoc(mysqli_query($conn,$queryPinjam));
$queryRiwayat = " SELECT COUNT(*) as total FROM borrowings WHERE siswa_id='$siswa_id'";
$riwayat = mysqli_fetch_assoc(mysqli_query($conn,$queryRiwayat));
$rekomendasi = mysqli_query($conn,"SELECT * FROM books ORDER BY id DESC LIMIT 6 ");
$buku_terbaru = mysqli_query($conn,"SELECT * FROM books ORDER BY id DESC LIMIT 6");
$buku = mysqli_fetch_assoc(mysqli_query($conn,"
    SELECT COUNT(*) as total FROM books "));
?>

<!DOCTYPE html>
    <html>
        <head>
            <title>Dashboard Siswa - SMKS Sinar Husni</title>
                <link rel="stylesheet" href="../assets/css/dashboard_siswa1.css">
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
                <div>
                    <h2>Halo, <?php echo $nama; ?> 👋</h2>
                    <p class="welcome-message">Selamat datang di perpustakaan digital - SMKS Sinar Husni</p>
                </div>
                <div class="clock">
                    <br><span id="tanggal"></span>
                    <span id="jam"></span>
                </div>
            </div>

    <div class="cards">
        <div class="card">
            <h3>Total Buku</h3>
            <p><?php echo $buku['total']; ?></p>
        </div>
        <div class="card">
            <h3>Buku Dipinjam</h3>
            <p><?php echo $pinjam['total']; ?></p>
        </div>
        <div class="card">
            <h3>Riwayat Pinjam</h3>
            <p><?php echo $riwayat['total']; ?></p>
        </div>
    </div>

        <h3 class="section-title">Buku Terbaru</h3>

    <div class="books">
        <?php while($b = mysqli_fetch_assoc($buku_terbaru)){ ?>
            <div class="book-card">
                <img src="../uploads/cover/<?php echo $b['cover']; ?>">
            <div class="book-info">
                <h4 class="judul"><?php echo $b['judul']; ?></h4>
                <p class="penulis"><?php echo $b['penulis']; ?></p>
            </div>
            <a href="../peminjaman/pinjam.php?id=<?php echo $b['id']; ?>" class="btn-pinjam"> Pinjam </a>
    </div>
<?php } ?>
</div>
</div>

<script>
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