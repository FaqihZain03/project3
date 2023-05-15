<?php
include_once '../../layout/header.php';

$q = $conn->query("SELECT * FROM pesanan");
?>
<form method="post" action="add.php" class="form-horizontal mt-2 mb-4 mx-auto p-4 border shadow-sm">
    <h2>Tambah Data pesanan</h2>
    <hr>
    <div class="form-group row mb-3">
        <label for="nama" class="col-4 col-form-label">Tanggal pesan</label>
        <div class="col-8">
            <div class="input-group">
                <input type="date" name="tanggal" class="form-control" placeholder="Nama pesanan">
            </div>
        </div>
    </div>

    <?php
    $qproduk = "SELECT * FROM produk";
    $rsproduk = $conn->query($qproduk);
    ?>

    <div class="form-group row mb-3">
        <label for="produk_id" class="col-4 col-form-label">Nama Product</label>
        <div class="col-8">
            <select name="produk_id" class="form-select">
                <?php
                foreach ($rsproduk as $rspro) {
                ?>
                    <option value="<?= $rspro['id'] ?>"><?= $rspro['nama'] ?></option>
                <?php
                }
                ?>
            </select>
        </div>
    </div>

    <div class="form-group row mb-3">
        <label for="quantity" class="col-4 col-form-label">Jumlah</label>
        <div class="col-8">
            <div class="input-group">
                <input type="number" name="quantity" class="form-control" placeholder="Jumlah">
            </div>
        </div>
    </div>

    <input type="submit" name="submit" value="Tambah Data" class="btn btn-success">
</form>
<hr>

<h1>Data pesanan</h1>
<!-- Read atau menampilkan data dari database -->
<table border="1" class="table table-bordered">
    <tr>
        <th>No.</th>
        <th>tanggal pesanan</th>
        <th>ID Produk</th>
        <th>Jumlah</th>
        <th colspan="2">Aksi</th>
    </tr>
    <?php
    // Tampilkan semua data
    $no = 1; // nomor urut
    while ($dt = $q->fetch_assoc()) :
    ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $dt['tanggal'] ?></td>
            <td><?= $dt['produk_id'] ?></td>
            <td><?= $dt['quantity'] ?></td>
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