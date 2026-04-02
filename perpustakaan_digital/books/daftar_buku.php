<?php
session_start();
include "../config/koneksi.php";
$cari = "";
if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];
    $query = mysqli_query($conn, "SELECT * FROM books WHERE judul LIKE '%$cari%'");
} else {
    $query = mysqli_query($conn, "SELECT * FROM books");
}
?>
<link rel="stylesheet" href="../assets/css/admin0.css">
<link rel="stylesheet" href="../assets/css/daftar_buku.css">
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
    <h1>Daftar Buku</h1>
<form method="GET" class="search-box" id="searchForm">
    <span class="search-icon">🔍</span>
    <input 
        type="text" 
        name="cari"
        id="searchInput"
        placeholder="Cari judul, penulis, atau kategori buku..."
        value="<?php echo $cari; ?>"
        autocomplete="off">
    <span class="clear-search" id="clearSearch">✖</span>
</form>
</div>
<div class="cards" id="hasilPencarian">
<?php while($buku = mysqli_fetch_assoc($query)) { ?>
<div class="card">
<img src="../uploads/cover/<?php echo $buku['cover']; ?>" 
style="width:100%; height:220px; object-fit:cover; border-radius:10px;">
<h3><?php echo $buku['judul']; ?></h3>
<p><b>Penulis:</b> <?php echo $buku['penulis']; ?></p>
<p><b>Kategori:</b> <?php echo $buku['kategori']; ?></p>
<p><b>Halaman:</b> <?php echo $buku['halaman']; ?></p>
<p><b>Tahun:</b> <?php echo $buku['tahun_terbit']; ?></p>
<p><b>Penerbit:</b> <?php echo $buku['penerbit']; ?></p>
<p class="deskripsi"><?php echo $buku['deskripsi']; ?></p>
<div class="card-footer">
        <div class="stok">
            Stok: <?php echo $buku['stok']; ?>
        </div>
        <div class="tombol-tengah">
            <a href="edit_buku.php?id=<?php echo $buku['id']; ?>" class="btn-edit">
                ✏ Edit
            </a>
        </div>
        <div class="tombol-kanan">
            <a href="hapus_buku.php?id=<?php echo $buku['id']; ?>" 
            class="btn-hapus"
            onclick="return confirm('Yakin ingin menghapus buku ini?');">
            🗑
            </a>
        </div>
    </div>
</div>
<?php } ?>
</div>
</div>
</div>
<div class="modal" id="bookModal">
<div class="modal-content">
<span class="close-modal">&times;</span>
<img id="modalCover">
<h2 id="modalJudul"></h2>
<p id="modalPenulis"></p>
<p id="modalKategori"></p>
<p id="modalHalaman"></p>
<p id="modalTahun"></p>
<p id="modalPenerbit"></p>
<p id="modalDeskripsi"></p>
</div>
</div>
<script src="../assets/js/operator.js"></script>
<script>
const cards = document.querySelectorAll(".buku-card");
const modal = document.getElementById("bookModal");
cards.forEach(card => {
card.addEventListener("click", () => {
modal.style.display = "flex";
document.getElementById("modalJudul").innerText = card.dataset.judul;
document.getElementById("modalPenulis").innerText = "Penulis: " + card.dataset.penulis;
document.getElementById("modalKategori").innerText = "Kategori: " + card.dataset.kategori;
document.getElementById("modalHalaman").innerText = "Halaman: " + card.dataset.halaman;
document.getElementById("modalTahun").innerText = "Tahun: " + card.dataset.tahun;
document.getElementById("modalPenerbit").innerText = "Penerbit: " + card.dataset.penerbit;
document.getElementById("modalDeskripsi").innerText = card.dataset.deskripsi;
document.getElementById("modalCover").src = "../uploads/cover/" + card.dataset.cover;
});
});
document.querySelector(".close-modal").onclick = function() {
modal.style.display = "none";
};
window.onclick = function(e) {
if (e.target == modal) {
modal.style.display = "none";
}
};
</script>
<script>
const searchInput = document.querySelector(".search-box input");
searchInput.addEventListener("input", function() {
    this.form.submit();
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
const input = document.getElementById("searchInput");
const clearBtn = document.getElementById("clearSearch");
const form = document.getElementById("searchForm");
function toggleClear(){
    if(input.value.length > 0){
        clearBtn.style.display = "block";
    } else {
        clearBtn.style.display = "none";
    }
}
toggleClear();
input.addEventListener("input", toggleClear);
clearBtn.addEventListener("click", () => {
    input.value = "";
    clearBtn.style.display = "block";
    input.focus();
});
input.addEventListener("keypress", function(e){
    if(e.key === "Enter"){
        form.submit();
    }
});
</script>