# Website Kategori Produk - Ferdiansyah Saragih

Website PHP + MySQL yang terhubung ke database `web1_pertemuan09`.

## Struktur database yang digunakan
- `kategori(id_kategori, nama_kategori)`
- `produk(id_produk, id_kategori, nama_produk, harga, stok)`
- Relasi: `produk.id_kategori` -> `kategori.id_kategori`

## Cara menjalankan
1. Pastikan XAMPP sudah terpasang.
2. Jalankan Apache dan MySQL dari XAMPP Control Panel.
3. Pastikan database `web1_pertemuan09` sudah ada di phpMyAdmin. **Jangan import ulang file reset jika tidak ingin menghapus data.**
4. Ekstrak folder `web-kategori-ferdi` ke `C:\xampp\htdocs\`.
5. Periksa pengaturan koneksi di `config/koneksi.php` (default XAMPP: user `root`, password kosong).
6. Buka `http://localhost/web-kategori-ferdi/`.

## Fitur
- Menampilkan kategori beserta jumlah produk (LEFT JOIN).
- Melihat produk per kategori dan semua produk (INNER JOIN).
- Tambah dan edit kategori.
- Hapus kategori dengan penanganan foreign key `ON DELETE RESTRICT`.

## Identitas
Nama: Ferdiansyah Saragih  
NIM: 25012029  
Kelas: 25MI1  
Politeknik Ganesha Medan

Website ini tidak membuat ulang database dan tidak mengubah data yang sudah ada saat pertama kali dibuka.
