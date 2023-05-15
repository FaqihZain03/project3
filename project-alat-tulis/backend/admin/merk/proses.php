<?php
require_once '../../../database/dbkoneksi.php';
if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $n_merk = $_POST['nama_merk'];
$q = $conn->query("UPDATE merk SET nama_merk = '$n_merk' WHERE id = '$id'");
if ($q) {
    // pesan jika data berubah
    echo "<script>alert('Data merk berhasil diubah'); window.location.href='index.php'</script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data merk gagal diubah'); window.location.href='index.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: index.php');
}