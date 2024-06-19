<?= $this->extend('supplier1/layout/template'); ?>
<?= $this->section('content'); ?>



<!-- Form tambah data -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-fw  fa-user-circle"></i> Form Tambah Data Supplier</h6>
    </div>
    <div class="card-body">

        <form action="/supplier/simpan" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>

            <!-- <div class="form-group">
                <label for="idtamu">ID Tamu</label>
                <input type="text" class="form-control" id="idtamu" name="idtamu" autofocus value="<?= old('kode'); ?>">
                <div class=" invalid-feedback">
                <?= $validation->getError('kode'); ?>
                </div>
            </div> -->

            <div class="form-group">
                <label for="kode">Kode Supplier </label>
                <input type="text" class="form-control <?= ($validation->hasError('kode')) ? 'is-invalid' : ''; ?>" id="kode" name="kode" autofocus value="<?= old('kode'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('kode'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="nama">Nama Supplier </label>
                <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= old('nama'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('nama'); ?>
                </div>
            </div>

            <div class="form-group mb-4">
                <label for="email">Email </label>
                <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" autofocus value="<?= old('email'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('email'); ?>
                </div>
            </div>
            <div class="form-group mb-4">
                <label for="hp">No Hp</label>
                <input type="text" class="form-control <?= ($validation->hasError('hp')) ? 'is-invalid' : ''; ?>" id="hp" name="hp" autofocus value="<?= old('hp'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('hp'); ?>
                </div>
            </div>
            <div class="form-group mb-4">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" autofocus value="<?= old('alamat'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('alamat'); ?>
                </div>
            </div>


            <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i> Submit</button>

            <a href="/supplier" class="btn btn-success"><i class="fas fa-undo"></i> Back</a>

        </form>
    </div>
</div>

<?= $this->endSection(); ?>