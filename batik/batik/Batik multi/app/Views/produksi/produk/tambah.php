<?= $this->extend('produksi/layout/template'); ?>
<?= $this->section('content'); ?>



<!-- Form tambah data -->

<div class="row">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-fw  fa-user-circle"></i><strong>Form Tambah Data Produk</strong></h6>
            </div>
            <div class="card-body">

                <form action="/produk/simpan" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>

                    <!-- <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" autofocus value="<?= old('kode'); ?>">
                <div class=" invalid-feedback">
                <?= $validation->getError('kode'); ?>
                </div>
            </div> -->

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="kode"><strong>Kode Produksi</strong></label>
                            <input type="text" class="form-control <?= ($validation->hasError('kode')) ? 'is-invalid' : ''; ?>" id="kode" name="kode" autofocus value="<?= old('kode'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('kode'); ?>
                            </div>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nama"><strong>Nama Batik</strong></label>
                            <div class="">
                                <select name="nama" class="form-control  <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" autofocus value="<?= old('nama'); ?>">>
                                    <option value="nama">Pilih</option>
                                    <?php foreach ($barang as $row2) : ?>
                                        <option value="<?= $row2['jenis_roti']; ?>"><?= $row2['jenis_roti']; ?></option>';
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="jenis"><strong>Jenis</strong></label>
                            <div class="form-group">
                                <select name="jenis" class="select2_single form-control">
                                    <option value="1" <?php if ($validation == '1') echo 'Selected'; ?>> --Jenis Produk--</option>
                                    <option value="1" <?php if ($validation == '1') echo 'Selected'; ?>> Baju</option>
                                    <option value="2" <?php if ($validation == '2') echo 'Selected'; ?>> Kain</option>
                                    <option value="3" <?php if ($validation == '2') echo 'Selected'; ?>> Sarimbit</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="ukuran"><strong>Ukuran</strong></label>
                        <div class="form-group">
                            <select name="ukuran" class="select2_single form-control">

                                <option value="3" <?php if ($validation == '2') echo 'Selected'; ?>> S</option>
                                <option value="1" <?php if ($validation == '1') echo 'Selected'; ?>> M</option>
                                <option value="2" <?php if ($validation == '2') echo 'Selected'; ?>> L</option>
                                <option value="3" <?php if ($validation == '2') echo 'Selected'; ?>> XL</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="hargaJual"><strong>Harga Jual</strong></label>
                            <div class="">
                                <select name="hargaJual" class="form-control  <?= ($validation->hasError('hargaJual')) ? 'is-invalid' : ''; ?>" autofocus value="<?= old('hargaJual'); ?>">>
                                    <option value="hargaJual">Harga Jual</option>
                                    <?php foreach ($penjualan as $row2) : ?>
                                        <option value="<?= $row2['harga_jual']; ?>"><?= $row2['harga_jual']; ?></option>';
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="jumlah"><strong>Jumlah</strong></label>
                            <input type="text" placeholder="Masukkan Jumlah" autocomplete="off" class="form-control <?= ($validation->hasError('jumlah')) ? 'is-invalid' : ''; ?>" id="jumlah" name="jumlah" autofocus value="<?= old('jumlah'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('jumlah'); ?>
                            </div>
                        </div>

                        <div class="form-group col-md">
                            <div class="custom-file col-md">
                                <input type="file" class="form-control custom-file-input <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" id="gambar" name="gambar" autofocus value="<?= old('gambar'); ?>" id="gambar" name="gambar">
                                <label class="custom-file-label" for="validatedCustomFile"><strong>Pilih Gambar...</strong></label>
                                <div class="invalid-feedback"> <?= $validation->getError('gambar'); ?></div>
                            </div>
                        </div>
                    </div>
            </div>

            <hr>



            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                <a href="/produk" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
            </div>
            </form>
        </div>
    </div>
</div>



<?= $this->endSection(); ?>