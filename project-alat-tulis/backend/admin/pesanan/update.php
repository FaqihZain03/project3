<?php
include_once '../../layout/header.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $q = $conn->query("SELECT * FROM pesanan WHERE id = '$id'");
    foreach ($q as $dt) :
?>
        <h2><?= $dt['tanggal'] ?></h2>
        <form action="proses.php" method="post" class="form-horizontal mt-2 mb-4 mx-auto p-4 border shadow-sm">
            <input type="hidden" name="id" value="<?= $dt['id'] ?>">

            <div class="form-group row mb-3">
                <label for="date" class="col-4 col-form-label">Tanggal pesanan</label>
                <div class="col-8">
                    <div class="input-group">
                        <input type="date" name="tanggal" value="<?= $dt['tanggal'] ?>" class="form-control" >
                    </div>
                </div>
            </div>
            <?php
            $qproduk = "SELECT * FROM produk";
            $rsproduk = $conn->query($qproduk);
            ?>
            <div class="form-group row mb-3">
                <label for="product" class="col-4 col-form-label">Jenis Product</label>
                <div class="col-8">
                    <select name="produk_id" class="form-select" >
                        <?php
                        foreach ($rsproduk as $rsm) {
                        ?>
                            <option value="<?= $rsm['id'] ?>"><?= $rsm['nama'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="quantity" class="col-4 col-form-label">Quantity</label>
                <div class="col-8">
                    <div class="input-group">
                        <input type="number" name="quantity" value="<?= $dt['quantity'] ?>" class="form-control" >
                    </div>
                </div>
            </div>
            <input type="submit" name="submit" value="Ubah Data" class="btn btn-success">
        </form>
<?php
    endforeach;
}
