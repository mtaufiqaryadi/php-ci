<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form tambah data mahasiswa
                </div>
                <div class="card-body">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="inputNama">Nama</label>
                            <input type="text" class="form-control" name="inputNama" id="inputNama">
                        </div>
                        <div class="form-group">
                            <label for="inputAlamat">Alamat</label>
                            <input type="text" class="form-control" name="inputAsal" id="inputAsal">
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah data </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>