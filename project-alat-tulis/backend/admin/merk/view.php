<?php
include_once '../../layout/header.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $q = $conn->query("SELECT * FROM merk WHERE id = '$id'");
    foreach ($q as $dt) :
?>
        <form class="form-horizontal mt-2 mb-4 mx-auto p-4 border shadow-sm">
            <input type="hidden" name="id" value="<?= $dt['id'] ?>">

            <div class="form-group row mb-3">
                <label for="nama" class="col-4 col-form-label">Nama Merk</label>
                <div class="col-8">
                    <div class="input-group">
                        <input type="text" name="nama_merk" value="<?= $dt['nama_merk'] ?>" class="form-control" disabled>
                    </div>
                </div>
            </div>
            <a href="index.php" class="btn btn-primary">Kembali</a>
        </form>
<?php
    endforeach;
}
