<?= $this->extend('supplier1/layout/template'); ?>
<?= $this->section('content'); ?>



<!-- Form tambah data -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-fw  fa-user-circle"></i> Form Edit Data Barang</h6>
    </div>
    <div class="card-body">

        <form action="/barangsupplier/update/<?= $barangsupplier['id']; ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="id" value="<?= $barangsupplier['id']; ?>">
            

            <!-- <div class="form-group">
                <label for="idtamu">ID Tamu</label>
                <input type="text" class="form-control" id="idtamu" name="idtamu" autofocus value="<?= old('kode'); ?>">
                <div class=" invalid-feedback">
                <?= $validation->getError('kode'); ?>
                </div>
            </div> -->

            <div class="form-group">
                <label for="kode">Kode </label>
                <input type="text" class="form-control <?= ($validation->hasError('kode')) ? 'is-invalid' : ''; ?>" id="kode" name="kode" autofocus value="<?= $barangsupplier['kode']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('kode'); ?>
                </div>
            </div>

            <div class="form-group mb-4">
                <label for="jenis_barang">Nama Barang</label>
                <input type="text" class="form-control <?= ($validation->hasError('jenis_barang')) ? 'is-invalid' : ''; ?>" id="jenis_barang" name="jenis_barang" autofocus value="<?= $barangsupplier['jenis_barang']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jenis_barang'); ?>
                </div>
            </div>

             <div class="form-group">
                <label for="stok">Stok</label>
                <input type="text" class="form-control <?= ($validation->hasError('stok')) ? 'is-invalid' : ''; ?>" id="stok" name="stok" autofocus value="<?= $barangsupplier['stok']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('stok'); ?>
                </div>
            </div>
            
            <div class="form-group">
                <label for="satuan">Satuan</label>
                <input type="text" class="form-control <?= ($validation->hasError('satuan')) ? 'is-invalid' : ''; ?>" id="satuan" name="satuan" autofocus value="<?= $barangsupplier['satuan']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('satuan'); ?>
                </div>
            </div>

            <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i> Submit</button>

            <a href="/barangsupplier" class="btn btn-success"><i class="fas fa-undo"></i> Back</a>

        </form>
    </div>
</div>

<?= $this->endSection(); ?>