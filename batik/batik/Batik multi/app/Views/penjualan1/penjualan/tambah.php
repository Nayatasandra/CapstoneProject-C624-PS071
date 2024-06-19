<?= $this->extend('penjualan1/layout/template'); ?>
<?= $this->section('content'); ?>



<!-- Form tambah data -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-fw  fa-user-circle"></i> Form Tambah Data Penjualan</h6>
    </div>
    <div class="card-body">

        <form action="/penjualan/simpan" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>

            <!-- <div class="form-group">
                <label for="kodekamar">Kode Kamar</label>
                <input type="text" class="form-control" id="kodekamar" name="kodekamar" autofocus value="<?= old('kode'); ?>">
                <div class=" invalid-feedback">
                <?= $validation->getError('kode'); ?>
                </div>
            </div> -->


            <div class="form-group">
                <label for="kode">Kode Transaksi </label>
                <input type="text" class="form-control <?= ($validation->hasError('kode')) ? 'is-invalid' : ''; ?>" id="kode" name="kode" autofocus value="<?= old('kode'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('kode'); ?>
                </div>
            </div>

            <div class="form-group">
                <label for="jenis_roti">Nama Roti</label>
                <div class="">
                    <select name="jenis_roti" class="form-control  <?= ($validation->hasError('jenis_roti')) ?
                                                                        'is-invalid' : ''; ?>" autofocus value="<?= old('jenis_roti'); ?>">>
                        <option value="jenis_roti">Pilih</option>
                        <?php foreach ($barang as $row2) : ?>
                            <option value="<?= $row2['jenis_roti']; ?>"><?= $row2['jenis_roti']; ?></option>';
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>


            <div class="form-group">
                <label for="jumlah">Jumlah </label>
                <input type="text" class="form-control <?= ($validation->hasError('jumlah')) ? 'is-invalid' : ''; ?>" id="jumlah" name="jumlah" autofocus value="<?= old('jumlah'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jumlah'); ?>
                </div>
            </div>

            <div class="form-group">
                <label for="harga_jual">Harga Jual </label>
                <input type="text" class="form-control <?= ($validation->hasError('harga_jual')) ? 'is-invalid' : ''; ?>" id="harga_jual" name="harga_jual" autofocus value="<?= old('harga_jual'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('harga_jual'); ?>
                </div>
            </div>


            <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i> Submit</button>

            <a href="/penjualan" class="btn btn-success"><i class="fas fa-undo"></i> Back</a>

        </form>
    </div>
</div>





<?= $this->endSection(); ?>