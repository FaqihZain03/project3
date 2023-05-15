<?php
include_once '../../layout/header.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $q = $conn->query("SELECT * FROM produk WHERE id = '$id'");
    foreach ($q as $dt) :
?>
        <form class="form-horizontal mt-2 mb-4 mx-auto p-4 border shadow-sm">
            <input type="hidden" name="id" value="<?= $dt['id'] ?>">

            <div class="form-group row mb-3">
                <label for="nama" class="col-4 col-form-label">Nama Produk</label>
                <div class="col-8">
                    <div class="input-group">
                        <input type="text" name="nama" value="<?= $dt['nama'] ?>" class="form-control" disabled>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="stok" class="col-4 col-form-label">Stok</label>
                <div class="col-8">
                    <div class="input-group">
                        <input type="number" name="stok" value="<?= $dt['stok'] ?>" class="form-control" disabled>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="harga" class="col-4 col-form-label">harga</label>
                <div class="col-8">
                    <div class="input-group">
                        <input type="number" name="harga" value="<?= $dt['harga'] ?>" class="form-control" disabled>
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
                    <select name="merk_id" class="form-select" disabled>
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
            <a href="index.php" class="btn btn-primary">Kembali</a>
        </form>
<?php
    endforeach;
}
