<?php
include_once '../../layout/header.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $q = $conn->query("SELECT * FROM merk WHERE id = '$id'");
    foreach ($q as $dt) :
?>
        <h2><?= $dt['nama_merk'] ?></h2>
        <form action="proses.php" method="post" class="form-horizontal mt-2 mb-4 mx-auto p-4 border shadow-sm">
            <input type="hidden" name="id" value="<?= $dt['id'] ?>">

            <div class="form-group row mb-3">
                <label for="nama_merk" class="col-4 col-form-label">Nama merk</label>
                <div class="col-8">
                    <div class="input-group">
                        <input type="text" name="nama_merk" value="<?= $dt['nama_merk'] ?>" class="form-control">
                    </div>
                </div>
            </div>
            <input type="submit" name="submit" value="Ubah Data" class="btn btn-success">
        </form>
<?php
    endforeach;
}
