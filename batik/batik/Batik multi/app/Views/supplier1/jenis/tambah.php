<?= $this->extend('supplier1/layout/template'); ?>
<?= $this->section('content'); ?>



<!-- Form tambah data -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-fw  fa-user-circle"></i> Form Tambah Data Jenis</h6>
    </div>
    <div class="card-body">

        <form action="/jenis/simpan" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>

            <!-- <div class="form-group">
                <label for="idtamu">ID Tamu</label>
                <input type="text" class="form-control" id="idtamu" name="idtamu" autofocus value="<?= old('kode'); ?>">
                <div class=" invalid-feedback">
                <?= $validation->getError('kode'); ?>
                </div>
            </div> -->

            <div class="form-group">
                <label for="kode">Kode </label>
                <input type="text" class="form-control <?= ($validation->hasError('kode')) ? 'is-invalid' : ''; ?>" id="kode" name="kode" autofocus value="<?= old('kode'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('kode'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="nama_jenis">Nama Jenis </label>
                <input type="text" class="form-control <?= ($validation->hasError('nama_jenis')) ? 'is-invalid' : ''; ?>" id="nama_jenis" name="nama_jenis" autofocus value="<?= old('nama_jenis'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('nama_jenis'); ?>
                </div>
            </div>



            

            <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i> Submit</button>

            <a href="/jenis" class="btn btn-success"><i class="fas fa-undo"></i> Back</a>

        </form>
    </div>
</div>

<?= $this->endSection(); ?>