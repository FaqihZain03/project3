<?php
require_once '../../../database/dbkoneksi.php';
if (isset($_POST['submit'])) {
  $n_merk = $_POST['nama_merk'];
// id_merk bernilai '' karena kita set auto increment
  $q = $conn->query("INSERT INTO merk VALUES ('', '$n_merk')");
if ($q) {
    // pesan jika data tersimpan
    echo "<script>alert('Data merk berhasil ditambahkan'); window.location.href='index.php'</script>";
  } else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Data merk gagal ditambahkan'); window.location.href='index.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: index.php');
}