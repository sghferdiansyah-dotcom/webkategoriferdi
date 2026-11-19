<?php
require_once "config/koneksi.php";
$pageTitle = "Daftar Produk";
$filter = isset($_GET['kategori']) ? (int)$_GET['kategori'] : 0;
$kategoriAktif = null;
if ($filter > 0) {
 $stmt = $conn->prepare("SELECT nama_kategori FROM kategori WHERE id_kategori=?");
 $stmt->bind_param("i", $filter); $stmt->execute(); $kategoriAktif = $stmt->get_result()->fetch_assoc();
}
$sql = "SELECT p.id_produk,p.nama_produk,p.harga,p.stok,k.nama_kategori
        FROM produk p INNER JOIN kategori k ON p.id_kategori=k.id_kategori";
if ($filter > 0) {
 $stmt = $conn->prepare($sql . " WHERE p.id_kategori=? ORDER BY p.id_produk DESC");
 $stmt->bind_param("i", $filter); $stmt->execute(); $produk = $stmt->get_result();
} else { $produk = $conn->query($sql . " ORDER BY p.id_produk DESC"); }
require "includes/header.php";
?>
<div class="page-heading"><p class="eyebrow">INVENTARIS</p><h1><?= $kategoriAktif ? "Produk: ".e($kategoriAktif['nama_kategori']) : "Semua produk" ?></h1>
<p>Daftar produk diambil melalui relasi tabel <code>produk</code> dan <code>kategori</code>.</p></div>
<div class="table-wrap"><table><thead><tr><th>ID</th><th>Nama produk</th><th>Kategori</th><th>Harga</th><th>Stok</th></tr></thead><tbody>
<?php if ($produk && $produk->num_rows): while($r=$produk->fetch_assoc()): ?>
<tr><td>#<?= (int)$r['id_produk'] ?></td><td><b><?= e($r['nama_produk']) ?></b></td><td><span class="pill"><?= e($r['nama_kategori']) ?></span></td><td>Rp <?= number_format((float)$r['harga'],0,',','.') ?></td><td><?= (int)$r['stok'] ?></td></tr>
<?php endwhile; else: ?><tr><td colspan="5" class="empty-cell">Tidak ada produk pada kategori ini.</td></tr><?php endif; ?>
</tbody></table></div>
<a class="back-link" href="index.php">← Kembali ke kategori</a>
<?php require "includes/footer.php"; ?>
