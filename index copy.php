<?php
require_once "config/koneksi.php";
$pageTitle = "Data Kategori";
$sql = "SELECT k.id_kategori, k.nama_kategori, COUNT(p.id_produk) AS jumlah_produk
        FROM kategori k LEFT JOIN produk p ON p.id_kategori = k.id_kategori
        GROUP BY k.id_kategori, k.nama_kategori ORDER BY k.id_kategori";
$kategori = $conn->query($sql);
$totalKategori = $conn->query("SELECT COUNT(*) AS total FROM kategori")->fetch_assoc()['total'];
$totalProduk = $conn->query("SELECT COUNT(*) AS total FROM produk")->fetch_assoc()['total'];
require "includes/header.php";
?>
<section class="hero">
 <div><p class="eyebrow">PENGELOLAAN DATABASE</p><h1>Kelola kategori<br><span>produk dengan mudah.</span></h1>
 <p class="hero-desc">Data ditampilkan langsung dari database MySQL <b>web1_pertemuan09</b>.</p></div>
 <div class="hero-mark">K<span>.</span></div>
</section>
<section class="stats">
 <div class="stat"><span>Total kategori</span><strong><?= (int)$totalKategori ?></strong></div>
 <div class="stat"><span>Total produk</span><strong><?= (int)$totalProduk ?></strong></div>
 <div class="stat"><span>Status database</span><strong class="online">Terhubung</strong></div>
</section>
<div class="section-heading"><div><p class="eyebrow">DAFTAR DATA</p><h2>Semua kategori</h2></div><a class="btn btn-primary" href="tambah_kategori.php">＋ Tambah kategori</a></div>
<div class="category-grid">
<?php if ($kategori && $kategori->num_rows > 0): ?>
 <?php while ($row = $kategori->fetch_assoc()): ?>
 <article class="category-card">
  <div class="category-top"><span class="category-icon">▦</span><span class="id-tag">ID <?= (int)$row['id_kategori'] ?></span></div>
  <h3><?= e($row['nama_kategori']) ?></h3>
  <p><?= (int)$row['jumlah_produk'] ?> produk terdaftar</p>
  <div class="card-actions">
   <a href="produk.php?kategori=<?= (int)$row['id_kategori'] ?>">Lihat produk →</a>
   <a class="muted-link" href="edit_kategori.php?id=<?= (int)$row['id_kategori'] ?>">Edit</a>
  </div>
 </article>
 <?php endwhile; ?>
<?php else: ?>
 <div class="empty">Belum ada kategori. Tambahkan kategori pertama.</div>
<?php endif; ?>
</div>
<?php require "includes/footer.php"; ?>
