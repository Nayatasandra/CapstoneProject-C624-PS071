<?= $this->extend('produksi/layout/template'); ?>
<?= $this->section('content'); ?>



<div class="col-md-6">
    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-fw  fa-user-circle"></i> <strong>Form Edit Data Produk</strong></h6>
        </div>
        <div class="card-body">
            <form action="/produk/update/<?= $produk['id']; ?>" method="POST" enctype="multipart/form-data"><?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $produk['id']; ?>">
                <input type="hidden" name="gambarLama" value="<?= $produk['gambar']; ?>">
                <!-- <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" autofocus value="<?= old('kode'); ?>">
                <div class=" invalid-feedback">
                <?= $validation->getError('kode'); ?>
                </div>
            </div> -->

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="kode"><strong>Kode</strong></label>
                        <input type="text" class="form-control <?= ($validation->hasError('kode')) ? 'is-invalid' : ''; ?>" id="kode" name="kode" autofocus value="<?= $produk['kode']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('kode'); ?>
                        </div>
                    </div>
                </div>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nama"><strong>Nama Roti</strong></label>
                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= $produk['nama']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
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
                            <option value="1" <?php if ($validation == '1') echo 'Selected'; ?>> --Ukuran--</option>
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
                        <label for="jumlah"><strong>Jumlah </strong></label>
                        <input type="text" class="form-control <?= ($validation->hasError('jumlah')) ? 'is-invalid' : ''; ?>" id="jumlah" name="jumlah" autofocus value="<?= $produk['jumlah']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('jumlah'); ?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-5">
                        <img class="img-thumbnail" src="/img/produk/<?= $produk['gambar']; ?>" height="20px">
                    </div>
                </div>

                <div class="custom-file mb-3">
                    <div class="col-sm-6">
                        <input type="file" class="form-control custom-file-input <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" id="gambar" name="gambar" autofocus value="<?= old('gambar'); ?>" id="gambar" name="gambar">
                        <label class="custom-file-label" for="validatedCustomFile">Pilih Gambar...</label>
                        <div class="invalid-feedback"> <?= $validation->getError('gambar'); ?></div>
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