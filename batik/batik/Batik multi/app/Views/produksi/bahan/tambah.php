<?= $this->extend('produksi/layout/template'); ?>
<?= $this->section('content'); ?>



<div class="row">
					<div class="col-md-6">				
                    <div class="card shadow">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-fw  fa-user-circle"></i><strong> Form Tambah Data Bahan Baku Produksi</strong></h6>
    </div>
    <div class="card-body">

        <form action="/bahan/simpan" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>

            <!-- <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" autofocus value="<?= old('kode'); ?>">
                <div class=" invalid-feedback">
                <?= $validation->getError('kode'); ?>
                </div>
            </div> -->

            <div class="form-row">
            <div class="form-group col-md-6">
                <label for="kode"><strong>Kode</strong></label>
                <input type="text"placeholder="Masukkan Kode" autocomplete="off" class="form-control <?= ($validation->hasError('kode')) ? 'is-invalid' : ''; ?>" id="kode" name="kode" autofocus value="<?= old('kode'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('kode'); ?>
                </div>
            </div>
            
            <div class="form-group col-md-6">
                <label for="nama">Nama Bahan Baku</label>
                <div class="">
                    <select name="nama"  class="form-control  <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>"  autofocus value="<?= old('nama'); ?>">>
                        <option value="nama">Pilih</option>
                            <?php foreach ($persediaan as $row2) :?>
                                <option value="<?= $row2['nama_brg'];?>"><?=$row2['nama_brg'];?></option>';
                                    <?php endforeach; ?>
                    </select>
                </div>
            </div>
            </div>
            <div class="form-row">
            <div class="form-group col-md-6">
                <label for="satuan">Satuan</label>
                <div class="form-group">
                        <select name="satuan" class="select2_single form-control">
                            <option value="1" <?php if($validation == '1') echo 'Selected'; ?>> --Satuan--</option>
                            <option value="1" <?php if($validation == '1') echo 'Selected'; ?>> Kg</option>
                            <option value="2" <?php if($validation == '2') echo 'Selected'; ?>> Liter</option>
                            <option value="3" <?php if($validation == '2') echo 'Selected'; ?>> Pcs</option>
                          
                        </select>
                    </div>
            </div>

            <div class="form-group col-md-6">
                <label for="stok">Stok</label>
                <input type="text" placeholder="Masukkan Stok" autocomplete="off"class="form-control <?= ($validation->hasError('stok')) ? 'is-invalid' : ''; ?>" id="stok" name="stok" autofocus value="<?= old('stok'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('stok'); ?>
                </div>
            </div>
                            </div>
<hr>

            <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i> Submit</button>

            <a href="/bahan" class="btn btn-success"><i class="fas fa-undo"></i> Back</a>

        </form>
    </div>
</div>
</div>
</div>
                           





<?= $this->endSection(); ?>