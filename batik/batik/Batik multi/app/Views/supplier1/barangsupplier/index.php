<?= $this->extend('supplier1/layout/template'); ?>
<?= $this->section('content'); ?>

<!-- Page Heading -->
<!-- <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800"> <i class="fas fa-fw  fa-user-circle"></i> Profile</h1>
</div> -->

<div class="row">
    <div class="col-6">
        <a href="/barangsupplier/tambah" class="btn btn-primary btn-icon-split mb-3">
            <span class="icon text-white-50">
                <i class="fas fa-plus-circle"></i>
            </span>
            <span class="text">Tambah Data Barang</span>
        </a>
        <a href="/Lbarangsupplier/cetakPengunjungPeriode" class="btn btn-danger btn-icon-spli mb-3">
            <span class="icon text-white-50">
                <i class="fas fa-file-pdf"></i>
            </span>
            <span class="text">Export</span>
        </a>
    </div>
</div>

<?php
    $conn = mysqli_connect("localhost", "root", "", "rotiqu_db");
    $ambildatastock = mysqli_query($conn,"select * from keluar where stok");

    while($fetch=mysqli_fetch_array($ambildatastock)){
        $kode= $fetch['kode_brg'];
        $barang= $fetch['nama_brg'];
?>
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Perhatian!</strong> Stok <strong><?=$barang;?></strong> Telah Berkurang, dengan Kode <strong><?=$kode;?></strong>
</div>
<?php
    }
?>

<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success my-2 text-center" role="alert">
        <i class="fas fa-check-circle"></i> <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif; ?>

<!-- Data Profile -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw  fa-user-circle"></i> Data Barang</h6>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                         <th>Kode</th>
                        <th>Nama Barang</th>
                        <th>Stok</th>
                        <th>Satuan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($barangsupplier as $row) : ?>
                        <tr>

                            <td><?= $row['kode']; ?></td>  
                            <td><?= $row['jenis_barang']; ?></td>
                            <td><?= $row['stok']; ?></td>
                            <td><?= $row['satuan']; ?></td>

                            <td>
                                <a href="/barangsupplier/edit/<?= $row['id']; ?>" class="badge badge-primary">Edit</a>

                                <form action="/barangsupplier/delete/<?= $row['id']; ?>" method="POST" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="badge badge-danger btn-sm" onclick="return confirm('Apa Anda Yakin hapus data?.');">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<?= $this->endSection(); ?>