<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>



<!-- Form tambah data -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-fw  fa-user-circle"></i> Form Edit Data Produksi</h6>
    </div>
    <div class="card-body">

        <form action="/tamu/update/<?= $tamu['id']; ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="id" value="<?= $tamu['id']; ?>">
            

            <!-- <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" autofocus value="<?= old('kode'); ?>">
                <div class=" invalid-feedback">
                <?= $validation->getError('kode'); ?>
                </div>
            </div> -->

            <div class="form-group">
                <label for="kode">Kode</label>
                <input type="text" class="form-control <?= ($validation->hasError('kode')) ? 'is-invalid' : ''; ?>" id="kode" name="kode" autofocus value="<?= $tamu['kode']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('kode'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="bahan_baku">Bahan Baku</label>
                <input type="text" class="form-control <?= ($validation->hasError('bahan_baku')) ? 'is-invalid' : ''; ?>" id="bahan_baku" name="bahan_baku" autofocus value="<?= $tamu['bahan_baku']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('bahan_baku'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="harga_pokok">Harga Pokok</label>
                <input type="text" class="form-control <?= ($validation->hasError('harga_pokok')) ? 'is-invalid' : ''; ?>" id="harga_pokok" name="harga_pokok" autofocus value="<?= $tamu['harga_pokok']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('harga_pokok'); ?>
                </div>
            </div>

            <div class="form-group">
                <label for="biaya_lain">Biaya Lain</label>
                <input type="text" class="form-control <?= ($validation->hasError('biaya_lain')) ? 'is-invalid' : ''; ?>" id="biaya_lain" name="biaya_lain" autofocus value="<?= $tamu['biaya_lain']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('biaya_lain'); ?>
                </div>
            </div>

            <div class="form-group mb-4">
                <label for="total_biayaproduksi">Total Biaya Produksi</label>
                <input type="text" class="form-control <?= ($validation->hasError('total_biayaproduksi')) ? 'is-invalid' : ''; ?>" id="total_biayaproduksi" name="total_biayaproduksi" autofocus value="<?= $tamu['total_biayaproduksi']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('total_biayaproduksi'); ?>
                </div>
            </div>

            <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i> Submit</button>

            <a href="/tamu" class="btn btn-success"><i class="fas fa-undo"></i> Back</a>

        </form>
    </div>
</div>





<?= $this->endSection(); ?>