<?php
include_once '../../layout/header.php';

$q = $conn->query("SELECT * FROM merk");
?>
<form method="post" action="add.php" class="form-horizontal mt-2 mb-4 mx-auto p-4 border shadow-sm">
    <h2>Tambah Data merk</h2>
    <hr>
    <div class="form-group row mb-3">
        <label for="nama" class="col-4 col-form-label">Nama Merk</label>
        <div class="col-8">
            <div class="input-group">
                <input type="text" name="nama_merk" class="form-control" placeholder="Nama merk">
            </div>
        </div>
    </div>
    <input type="submit" name="submit" value="Tambah Data" class="btn btn-success">
</form>
<hr>

<h1>Data merk</h1>
<!-- Read atau menampilkan data dari database -->
<table border="1" class="table table-bordered">
    <tr>
        <th>No.</th>
        <th>Nama merk</th>
        <th colspan="2">Aksi</th>
    </tr>
    <?php
    // Tampilkan semua data
    $no = 1; // nomor urut
    while ($dt = $q->fetch_assoc()) :
    ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $dt['nama_merk'] ?></td>
            <td>
                <a href="view.php?id=<?= $dt['id'] ?>" class="btn btn-outline-primary">Lihat</a>
                <a href="update.php?id=<?= $dt['id'] ?>" class="btn btn-outline-warning">Ubah</a>
                <a href="delete.php?id=<?= $dt['id'] ?>" class="btn btn-outline-danger" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
            </td>
        </tr>
    <?php
    endwhile;
    ?>
</table>

<?php
include_once '../../layout/footer.php'; ?>