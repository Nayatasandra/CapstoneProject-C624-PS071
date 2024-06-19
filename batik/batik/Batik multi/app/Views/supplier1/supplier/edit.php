<?= $this->extend('supplier1/layout/template'); ?>
<?= $this->section('content'); ?>



<!-- Form tambah data -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-fw  fa-user-circle"></i> Form Edit Data Supplier</h6>
    </div>
    <div class="card-body">

        <form action="/supplier/update/<?= $supplier['id']; ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="id" value="<?= $supplier['id']; ?>">
            

            <!-- <div class="form-group">
                <label for="idtamu">ID Tamu</label>
                <input type="text" class="form-control" id="idtamu" name="idtamu" autofocus value="<?= old('kode'); ?>">
                <div class=" invalid-feedback">
                <?= $validation->getError('kode'); ?>
                </div>
            </div> -->

            <div class="form-group">
                <label for="kode">Kode Supplier </label>
                <input type="text" class="form-control <?= ($validation->hasError('kode')) ? 'is-invalid' : ''; ?>" id="kode" name="kode" autofocus value="<?= $supplier['kode']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('kode'); ?>
                </div>
            </div>

            <div class="form-group">
                <label for="nama">Nama Supplier </label>
                <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= $supplier['nama']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('nama'); ?>
                </div>
            </div>
        
            <div class="form-group mb-4">
                <label for="email">Email</label>
                <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" autofocus value="<?= $supplier['email']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('email'); ?>
                </div>
            </div>

             <div class="form-group">
                <label for="hp">No Hp</label>
                <input type="text" class="form-control <?= ($validation->hasError('hp')) ? 'is-invalid' : ''; ?>" id="hp" name="hp" autofocus value="<?= $supplier['hp']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('hp'); ?>
                </div>
            </div>
            
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" autofocus value="<?= $supplier['alamat']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('alamat'); ?>
                </div>
            </div>

            <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i> Submit</button>

            <a href="/supplier" class="btn btn-success"><i class="fas fa-undo"></i> Back</a>

        </form>
    </div>
</div>

<?= $this->endSection(); ?>