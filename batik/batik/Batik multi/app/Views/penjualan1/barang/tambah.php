<?= $this->extend('penjualan1/layout/template'); ?>
<?= $this->section('content'); ?>



<!-- Form tambah data -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-fw  fa-user-circle"></i> Form Tambah Data Stok Roti</h6>
    </div>
    <div class="card-body">

        <form action="/barang/simpan" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>

            <!-- <div class="form-group">
                <label for="kodekamar">Kode Kamar</label>
                <input type="text" class="form-control" id="kodekamar" name="kodekamar" autofocus value="<?= old('kode'); ?>">
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
                <label for="jenis_roti">Nama Batik</label>
                <select id="jenis_roti" class="form-control" name="jenis_roti" autofocus value="<?= old('jenis_roti'); ?>">
                    <option>Batik Megamendung</option>
                    <option>Baju Cewe motif Mega Mendung Atmaja Hijau </option>
                    <option>Baju Cowo motif Mega Mendung Atmaja Hijau </option>
                    <option>Baju Cowo motif Motif Burung Mega Mendung Mamera Premium </option>
                    <option>Baju Cewe motif Motif Burung Mega Mendung Mamera Premium </option>
                    <option>BATIK TRUSMI Atasan Wanita Outer Batik Motif Mega Mendung Pink Sabyan </option>

                    <?= $validation->getError('jenis_roti'); ?>
            </div>
    </div>
</div>
</select>

<div class="form-group">
    <label for="jumlah">Jumlah </label>
    <input type="text" class="form-control <?= ($validation->hasError('jumlah')) ? 'is-invalid' : ''; ?>" id="jumlah" name="jumlah" autofocus value="<?= old('jumlah'); ?>">
    <div class="invalid-feedback">
        <?= $validation->getError('jumlah'); ?>
    </div>
</div>

<button type="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i> Submit</button>

<a href="/barang" class="btn btn-success"><i class="fas fa-undo"></i> Back</a>

</form>
</div>
</div>


<?= $this->endSection(); ?>