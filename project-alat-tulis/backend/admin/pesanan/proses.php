<?php
require_once '../../../database/dbkoneksi.php';
if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $tanggal = $_POST['tanggal'];
  $produk_id = $_POST['produk_id'];
  $quantity = $_POST['quantity'];
$q = $conn->query("UPDATE pesanan SET tanggal = '$tanggal', produk_id = '$produk_id', quantity = '$quantity' WHERE id = '$id'");
if ($q) {
    // pesan jika data berubah
    echo "<script>alert('Data pesanan berhasil diubah'); window.location.href='index.php'</script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data pesanan gagal diubah'); window.location.href='index.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: index.php');
}