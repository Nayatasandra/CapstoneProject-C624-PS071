<?= $this->extend('supplier1/layout/template'); ?>
<?= $this->section('content'); ?>



<!-- Form tambah data -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-fw  fa-user-circle"></i> Form Tambah Data Barang</h6>
    </div>
    <div class="card-body">

        <form action="/barangsupplier/simpan" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>

            <!-- <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" autofocus value="<?= old('kode'); ?>">
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
                <label for="jenis_barang">Nama Barang </label>
                <div class="">
                                                <select name="jenis_barang"  class="form-control  <?= ($validation->hasError('jenis_barang')) ? 
                                                    'is-invalid' : ''; ?>"  autofocus value="<?= old('jenis_barang'); ?>">>
                                                    <option value="jenis_barang">Pilih</option>
                                                        <?php foreach ($jenis as $row2) :?>
                                                            <option value="<?= $row2['nama_jenis'];?>"><?=$row2['nama_jenis'];?></option>';
                                                        <?php endforeach; ?>
                                                </select>
                                            </div>
                                                        </div>
            <div class="form-group">
                <label for="stok"> Stok </label>
                <input type="text" class="form-control <?= ($validation->hasError('stok')) ? 'is-invalid' : ''; ?>" id="stok" name="stok" autofocus value="<?= old('stok'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('stok'); ?>
                </div>
            </div>

            <div class="form-group">
                <label for="satuan">Satuan</label>
                <div class="">
                                                <select name="satuan"  class="form-control  <?= ($validation->hasError('satuan')) ? 
                                                    'is-invalid' : ''; ?>"  autofocus value="<?= old('satuan'); ?>">>
                                                    <option value="satuan">Pilih</option>
                                                        <?php foreach ($ketersediaan as $row2) :?>
                                                            <option value="<?= $row2['nama_satuan'];?>"><?=$row2['nama_satuan'];?></option>';
                                                        <?php endforeach; ?>
                                                </select>
                                            </div>
                                                        </div>

            <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i> Submit</button>

            <a href="/barangsupplier" class="btn btn-success"><i class="fas fa-undo"></i> Back</a>

        </form>
    </div>
</div>





<?= $this->endSection(); ?>