<?php
require_once '../../../database/dbkoneksi.php';
if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $n_produk = $_POST['nama'];
  $stok = $_POST['stok'];
  $harga = $_POST['harga'];
  $merk_id = $_POST['merk_id'];
$q = $conn->query("UPDATE produk SET nama = '$n_produk', stok = '$stok', harga = '$harga', merk_id = '$merk_id' WHERE id = '$id'");
if ($q) {
    // pesan jika data berubah
    echo "<script>alert('Data produk berhasil diubah'); window.location.href='index.php'</script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data produk gagal diubah'); window.location.href='index.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: index.php');
}