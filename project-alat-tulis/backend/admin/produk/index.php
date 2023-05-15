<?php
include_once '../../layout/header.php';

$q = $conn->query("SELECT * FROM produk");
?>
<form method="post" action="add.php" class="form-horizontal mt-2 mb-4 mx-auto p-4 border shadow-sm">
    <h2>Tambah Data Produk</h2>
    <hr>
    <div class="form-group row mb-3">
        <label for="nama" class="col-4 col-form-label">Nama Produk</label>
        <div class="col-8">
            <div class="input-group">
                <input type="text" name="nama" class="form-control" placeholder="Nama Produk">
            </div>
        </div>
    </div>

    <div class="form-group row mb-3">
        <label for="stok" class="col-4 col-form-label">Stok</label>
        <div class="col-8">
            <div class="input-group">
                <input type="number" name="stok" class="form-control" placeholder="stok">
            </div>
        </div>
    </div>

    <div class="form-group row mb-3">
        <label for="harga" class="col-4 col-form-label">harga</label>
        <div class="col-8">
            <div class="input-group">
                <input type="number" name="harga" class="form-control" placeholder="Harga">
            </div>
        </div>
    </div>
    <?php
    $qmerk = "SELECT * FROM merk";
    $rsmerk = $conn->query($qmerk);
    ?>

    <div class="form-group row mb-3">
        <label for="product" class="col-4 col-form-label">Jenis Product</label>
        <div class="col-8">
            <select name="merk_id" class="form-select">
                <?php
                foreach ($rsmerk as $rsm) {
                ?>
                    <option value="<?= $rsm['id'] ?>"><?= $rsm['nama_merk'] ?></option>
                <?php
                }
                ?>
            </select>

        </div>
    </div>
    <input type="submit" name="submit" value="Tambah Data" class="btn btn-success">
</form>
<hr>

<h1>Data Produk</h1>
<!-- Read atau menampilkan data dari database -->
<table border="1" class="table table-bordered">
    <tr>
        <th>No.</th>
        <th>Nama Produk</th>
        <th>Stok</th>
        <th>Harga</th>
        <th>Merk ID</th>
        <th colspan="2">Aksi</th>
    </tr>
    <?php
    // Tampilkan semua data
    $no = 1; // nomor urut
    while ($dt = $q->fetch_assoc()) :
    ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $dt['nama'] ?></td>
            <td><?= $dt['stok'] ?></td>
            <td><?= $dt['harga'] ?></td>
            <td><?= $dt['merk_id'] ?></td>
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