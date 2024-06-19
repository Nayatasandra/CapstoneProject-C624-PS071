<?= $this->extend('produksi/layout/template'); ?>
<?= $this->section('content'); ?>

<!-- Page Heading -->
<!-- <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800"> <i class="fas fa-fw  fa-user-circle"></i> Profile</h1>
</div> -->

<!-- <div class="row">
    <div class="col-6">
        <a href=# class="btn btn-primary btn-icon-split mb-3">
            <span class="icon text-white-50">
                <i class="fas fa-plus-circle"></i>
            </span>
            <span class="text">Tambah Data</span>
        </a> -->
<!-- <a href="/LProduk/cetakPengunjungPeriode" class="btn btn-danger btn-icon-spli mb-3">
            <span class="icon text-white-50">
                <i class="fas fa-file-pdf"></i>
            </span>
            <span class="text">Export</span>
        </a> -->
</div>
</div>

<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success my-2 text-center" role="alert">
        <i class="fas fa-check-circle"></i> <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif; ?>

<!-- Data Profile -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw  fa-user-circle"></i> Data Produk</h6>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>id transkasi</th>
                        <th>Nama</th>
                        <th>no hp</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>total Produk</th>
                        <th>total Pemesanan</th>
                        <th>Tanggal transkasi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($laporan as $row) : ?>
                        <tr>
                            <td><?= $row['id_trans1']; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['no_hp']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td><?= $row['alamat']; ?></td>
                            <td><?= $row['total_produk']; ?></td>
                            <td><?= $row['total_harga']; ?></td>
                            <td><?= $row['tanggal_trans']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<?= $this->endSection(); ?>