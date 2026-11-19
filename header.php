<?php
if (session_status() === PHP_SESSION_NONE) session_start();
function e($value) { return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'); }
?>
<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= isset($pageTitle) ? e($pageTitle) : 'Katalog Kategori' ?></title>
<link rel="stylesheet" href="assets/style.css">
</head>
<body>
<header class="topbar">
  <a class="brand" href="index.php"><span class="brand-icon">K</span><span>Katalog<span class="brand-light">Kita</span></span></a>
  <nav><a href="index.php">Kategori</a><a href="produk.php">Semua Produk</a></nav>
</header>
<main class="container">
<?php if (!empty($_SESSION['flash'])): ?>
<div class="alert"><?= e($_SESSION['flash']); unset($_SESSION['flash']); ?></div>
<?php endif; ?>
