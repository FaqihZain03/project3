<?php
require_once '../../../database/dbkoneksi.php';
if (isset($_POST['submit'])) {
  $tanggal = $_POST['tanggal'];
  $produk_id = $_POST['produk_id'];
  $quantity = $_POST['quantity'];
  $q = $conn->query("INSERT INTO pesanan VALUES ('', '$tanggal', '$produk_id', '$quantity')");
if ($q) {
    echo "<script>alert('Data pesanan berhasil ditambahkan'); window.location.href='index.php'</script>";
  } else {
    echo "<script>alert('Data pesanan gagal ditambahkan'); window.location.href='index.php'</script>";
  }
} else {
  header('Location: index.php');
}