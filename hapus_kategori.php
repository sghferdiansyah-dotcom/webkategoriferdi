<?php
require_once "config/koneksi.php";
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header("Location: index.php"); exit; }
$id=(int)($_POST['id'] ?? 0);
$stmt=$conn->prepare("DELETE FROM kategori WHERE id_kategori=?");
$stmt->bind_param("i",$id);
if($stmt->execute()){
 $_SESSION['flash']=$stmt->affected_rows ? "Kategori berhasil dihapus." : "Kategori tidak ditemukan.";
} elseif($stmt->errno===1451){
 $_SESSION['flash']="Kategori tidak bisa dihapus karena masih digunakan oleh produk. Hapus atau pindahkan produknya terlebih dahulu.";
} else { $_SESSION['flash']="Gagal menghapus kategori."; }
header("Location: index.php"); exit;
