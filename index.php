<?php
// panggil koneksinya
require_once 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Sistem Basis Data - CRUD dengan PHP MySQLi</title>
</head>
<body>
  <h1>Sistem Basis Data  - CRUD dengan PHP MySQLi</h1>
  
  <!-- 
  Create atau menambahkan data baru 
  Data akan dikirimkan ke add.php untuk diproses
  -->
  <form method="post" action="add.php">
    <input type="text" name="nama_produk" placeholder="Nama Produk Baru">
    <input type="number" name="harga" placeholder="Harga Produk">
    <input type="number" name="qty" placeholder="Qty Produk">
    <input type="submit" name="submit" value="Tambah Data Baru">
  </form><br/>

  <!-- Read atau menampilkan data dari database -->
  <table border="1">
    <tr>
      <th>No. &nbsp;&nbsp;&nbsp;</th> <th>Nama Produk&nbsp;&nbsp;</th>
      <th>Harga&nbsp;&nbsp;&nbsp;</th>
      <th>Qty&nbsp;&nbsp;&nbsp;</th>
      <th colspan="3">Aksi&nbsp;&nbsp;&nbsp;</th>
    </tr>

    <?php
    // Tampilkan semua data
    $q = $conn->query("SELECT id_produk, nama_produk as nama, 
	harga, qty as jumlah 
	FROM produk");

    $no = 1; // nomor urut
    while ($dt = $q->fetch_assoc()) :
    ?>

    <tr>  
      <td><?= $no++ ?></td>
      <td><?= $dt['nama'] ?></td>
      <td><?= $dt['harga'] ?></td>
      <td><?= $dt['jumlah'] ?></td>
	  <td><a href="edit.php">edit</a></td>
	  <td><a href="update.php?id=<?= $dt['id_produk'] ?>">Ubah</a></td>
      <td><a href="delete.php?id=<?= $dt['id_produk'] ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a></td>
    </tr>

    <?php
    endwhile;
    ?> 

  </table>
</body>
</html>