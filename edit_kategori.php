<?php
require_once "config/koneksi.php";
$pageTitle = "Edit Kategori";
$id = (int)($_GET['id'] ?? $_POST['id'] ?? 0);
$stmt = $conn->prepare("SELECT nama_kategori FROM kategori WHERE id_kategori=?");
$stmt->bind_param("i",$id); $stmt->execute(); $data=$stmt->get_result()->fetch_assoc();
if (!$data) { http_response_code(404); exit("Kategori tidak ditemukan."); }
$error="";
if($_SERVER['REQUEST_METHOD']==='POST'){
 $nama=trim($_POST['nama_kategori'] ?? '');
 if($nama==='') $error="Nama kategori wajib diisi.";
 else {
  $up=$conn->prepare("UPDATE kategori SET nama_kategori=? WHERE id_kategori=?");
  $up->bind_param("si",$nama,$id);
  if($up->execute()){ $_SESSION['flash']="Kategori berhasil diperbarui."; header("Location: index.php"); exit; }
  $error=$up->errno===1062 ? "Nama kategori sudah digunakan." : "Gagal memperbarui kategori.";
 }
}
require "includes/header.php";
?>
<div class="form-card"><p class="eyebrow">DATA KATEGORI · ID <?= $id ?></p><h1>Edit kategori</h1><p class="form-intro">Perbarui nama kategori yang dipilih.</p>
<?php if($error): ?><div class="error"><?= e($error) ?></div><?php endif; ?>
<form method="post"><input type="hidden" name="id" value="<?= $id ?>"><label for="nama">Nama kategori</label><input id="nama" name="nama_kategori" maxlength="80" required value="<?= e($_POST['nama_kategori'] ?? $data['nama_kategori']) ?>"><div class="form-actions"><a class="btn btn-secondary" href="index.php">Batal</a><button class="btn btn-primary">Simpan perubahan</button></div></form>
<form method="post" action="hapus_kategori.php" onsubmit="return confirm('Yakin ingin menghapus kategori ini? Kategori yang masih memiliki produk tidak dapat dihapus.');" class="delete-form"><input type="hidden" name="id" value="<?= $id ?>"><button class="btn btn-danger">Hapus kategori</button></form>
</div>
<?php require "includes/footer.php"; ?>
