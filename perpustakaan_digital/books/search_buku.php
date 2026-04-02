<?php
include "../config/koneksi.php";
$cari = $_GET['cari'];
$query = mysqli_query($conn, "SELECT * FROM books 
WHERE judul LIKE '%$cari%' 
OR penulis LIKE '%$cari%' 
OR kategori LIKE '%$cari%'");
while($buku = mysqli_fetch_assoc($query)) {
?>

<div class="card buku-card">
<img src="../uploads/cover/<?php echo $buku['cover']; ?>">
<h3><?php echo $buku['judul']; ?></h3>
<p><?php echo $buku['penulis']; ?></p>
<p><b>Kategori:</b> <?php echo $buku['kategori']; ?></p>
<p><b>Halaman:</b> <?php echo $buku['halaman']; ?></p>
<p><b>Tahun:</b> <?php echo $buku['tahun_terbit']; ?></p>
<p><b>Penerbit:</b> <?php echo $buku['penerbit']; ?></p>
<p class="deskripsi"><?php echo $buku['deskripsi']; ?></p>
<p><b>Stok:</b> <?php echo $buku['stok']; ?></p>
<a href="edit_buku.php?id=<?php echo $buku['id']; ?>" class="btn-edit">Edit</a>
<a href="hapus_buku.php?id=<?php echo $buku['id']; ?>" class="btn-hapus">Hapus</a>
</div>
<?php } ?>