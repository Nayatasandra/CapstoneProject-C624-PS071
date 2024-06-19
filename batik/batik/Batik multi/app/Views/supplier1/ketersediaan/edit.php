<?= $this->extend('supplier1/layout/template'); ?>
<?= $this->section('content'); ?>



<!-- Form tambah data -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-fw  fa-user-circle"></i> Form Edit Data Satuan</h6>
    </div>
    <div class="card-body">

        <form action="/ketersediaan/update/<?= $ketersediaan['id']; ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="id" value="<?= $ketersediaan['id']; ?>">
            

            <!-- <div class="form-group">
                <label for="idtamu">ID Tamu</label>
                <input type="text" class="form-control" id="idtamu" name="idtamu" autofocus value="<?= old('kode'); ?>">
                <div class=" invalid-feedback">
                <?= $validation->getError('kode'); ?>
                </div>
            </div> -->

            <div class="form-group">
                <label for="kode">Kode </label>
                <input type="text" class="form-control <?= ($validation->hasError('kode')) ? 'is-invalid' : ''; ?>" id="kode" name="kode" autofocus value="<?= $ketersediaan['kode']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('kode'); ?>
                </div>
            </div>

            <div class="form-group">
                <label for="nama_satuan">Nama Satuan </label>
                <input type="text" class="form-control <?= ($validation->hasError('nama_satuan')) ? 'is-invalid' : ''; ?>" id="nama_satuan" name="nama_satuan" autofocus value="<?= $ketersediaan['nama_satuan']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('nama_satuan'); ?>
                </div>
            </div>
        
           
            <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i> Submit</button>

            <a href="/ketersediaan" class="btn btn-success"><i class="fas fa-undo"></i> Back</a>

        </form>
    </div>
</div>

<?= $this->endSection(); ?>