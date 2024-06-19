<?= $this->extend('produksi/layout/template'); ?>
<?= $this->section('content'); ?>

<!-- Page Heading -->
<!-- <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800"> <i class="fas fa-fw  fa-user-circle"></i> Profile</h1>
</div> -->

<div class="row">
    <div class="col-6">
        <a href="/produk/tambah" class="btn btn-primary btn-icon-split mb-3">
            <span class="icon text-white-50">
                <i class="fas fa-plus-circle"></i>
            </span>
            <span class="text">Tambah Data</span>
        </a>
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
                        <th>Gambar</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Ukuran</th>
                        <th>Jumlah</th>
                        <th>Harga Jual</th>

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produk as $row) : ?>
                        <tr>
                            <td>
                                <img src="/img/produk/<?= $row['gambar']; ?>" width="100px">
                            </td>
                            <td><?= $row['kode']; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['jenis']; ?></td>
                            <td><?= $row['ukuran']; ?></td>
                            <td><?= $row['jumlah']; ?></td>
                            <td>Rp <?= $row['hargaJual']; ?></td>

                            <td>
                                <a href="/produk/edit/<?= $row['id']; ?>" class="badge badge-primary">Edit</a>

                                <form action="/produk/delete/<?= $row['id']; ?>" method="POST" class="d-inline">
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
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Nikmah Risqi 2023</span>
        </div>
    </div>
</footer>
<?= $this->endSection(); ?>