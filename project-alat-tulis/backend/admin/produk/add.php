<?php
require_once '../../../database/dbkoneksi.php';
if (isset($_POST['submit'])) {
  $n_produk = $_POST['nama'];
  $stok = $_POST['stok'];
  $harga = $_POST['harga'];
  $merk_id = $_POST['merk_id'];
// id_produk bernilai '' karena kita set auto increment
  $q = $conn->query("INSERT INTO produk VALUES ('', '$n_produk', '$stok', '$harga', '$merk_id')");
if ($q) {
    // pesan jika data tersimpan
    echo "<script>alert('Data produk berhasil ditambahkan'); window.location.href='index.php'</script>";
  } else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Data produk gagal ditambahkan'); window.location.href='index.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: index.php');
}