
<?php
require_once "config/koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Kategori</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 40px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 70%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th {
            background-color: #007bff;
            color: white;
            padding: 15px;
            text-align: center;
        }

        td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            color: #333;
        }

        tr:hover td {
            background-color: #eaf3ff;
        }

        tr:last-child td {
            border-bottom: none;
        }
    </style>
</head>

<body>
<table border="1px"> 
        <tr>
          <td>Id Produk</td>
          <td>Nama Produk</td>
          <td>Nama Kategori</td>
          <td>Harga</td>
          <td>Stok</td>

        </tr>
        <?php
         $sql="Select b.id_produk, b.nama_produk, a.nama_kategori, b.harga, b.stok
               from kategori as a,produk as b 
               where a.id_kategori=b.id_kategori";
         $y = mysqli_query($conn,$sql);

        
         while ($x = mysqli_fetch_assoc($y)) {
               echo "
               <tr>
                <td>{$x['id_produk']}</td>
                <td>{$x['nama_produk']}</td>
                <td>{$x['nama_kategori']}</td>
                <td>{$x['harga']}</td>
                <td>{$x['stok']}</td>
               </tr>";
         }
        ?>
</table>

