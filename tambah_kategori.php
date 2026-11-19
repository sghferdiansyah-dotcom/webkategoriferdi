<?php
require_once "config/koneksi.php";
$pageTitle = "Tambah Kategori";
$error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 $nama = trim($_POST['nama_kategori'] ?? '');
 if ($nama === '') $error = "Nama kategori wajib diisi.";
 elseif (mb_strlen($nama) > 80) $error = "Nama kategori maksimal 80 karakter.";
 else {
  $stmt = $conn->prepare("INSERT INTO kategori (nama_kategori) VALUES (?)");
  $stmt->bind_param("s", $nama);
  if ($stmt->execute()) { $_SESSION['flash']="Kategori berhasil ditambahkan."; header("Location: index.php"); exit; }
  $error = $stmt->errno === 1062 ? "Nama kategori sudah digunakan." : "Gagal menyimpan kategori.";
 }
}
require "includes/header.php";
?>
<div class="form-card"><p class="eyebrow">DATA KATEGORI</p><h1>Tambah kategori</h1><p class="form-intro">Masukkan nama kategori baru.</p>
<?php if($error): ?><div class="error"><?= e($error) ?></div><?php endif; ?>
<form method="post"><label for="nama">Nama kategori</label><input id="nama" name="nama_kategori" maxlength="80" required placeholder="Contoh: Peralatan Kantor" value="<?= e($_POST['nama_kategori'] ?? '') ?>"><div class="form-actions"><a class="btn btn-secondary" href="index.php">Batal</a><button class="btn btn-primary">Simpan kategori</button></div></form></div>
<?php require "includes/footer.php"; ?>
