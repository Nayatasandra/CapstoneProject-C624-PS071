<?= $this->extend('produksi/layout/template'); ?>
<?= $this->section('content'); ?>



<!-- Form tambah data -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-fw  fa-user-circle"></i> Form Edit Data Produksi</h6>
    </div>
    <div class="card-body">

        <form action="/bahan/update/<?= $bahan['id']; ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="id" value="<?= $bahan['id']; ?>">
            

            <!-- <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" autofocus value="<?= old('kode'); ?>">
                <div class=" invalid-feedback">
                <?= $validation->getError('kode'); ?>
                </div>
            </div> -->

            <div class="form-group">
                <label for="kode">Kode</label>
                <input type="text" class="form-control <?= ($validation->hasError('kode')) ? 'is-invalid' : ''; ?>" id="kode" name="kode" autofocus value="<?= $bahan['kode']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('kode'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= $bahan['nama']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('nama'); ?>
                </div>
            </div>
            <div class="form-group">
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

        

            <div class="form-group mb-4">
                <label for="stok">Stok</label>
                <input type="text" class="form-control <?= ($validation->hasError('stok')) ? 'is-invalid' : ''; ?>" id="stok" name="stok" autofocus value="<?= $bahan['stok']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('stok'); ?>
                </div>
            </div>

            <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i> Submit</button>

            <a href="/bahan" class="btn btn-success"><i class="fas fa-undo"></i> Back</a>

        </form>
    </div>
</div>





<?= $this->endSection(); ?>