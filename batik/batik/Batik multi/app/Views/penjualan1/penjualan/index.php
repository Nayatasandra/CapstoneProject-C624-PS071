<?= $this->extend('penjualan1/layout/template'); ?>
<?= $this->section('content'); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
    </symbol>
    <symbol id="info-fill" viewBox="0 0 16 16">
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"></path>
    </symbol>
    <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
    </symbol>

    < Page Heading>
        <<div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h3 mb-0 text-gray-800"> <i class="fas fa-fw  fa-user-circle"></i> Data Transaksi Penjualan</h1>
            </div>

            <div class="row">
                <div class="col-6">
                    <a href="/penjualan/tambah" class="btn btn-info btn-icon-split mb-3">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus-circle"></i>
                        </span>
                        <span class="text">Tambah Data</span>
                    </a>

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
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw  fa-user-circle"></i> Data Transaksi Penjualan</h6>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>

                                    <th>Kode Transaksi</th>
                                    <th>Nama Batik</th>
                                    <th>Jumlah</th>
                                    <th>Harga Jual</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($penjualan as $row) : ?>
                                    <tr>

                                        <td><?= $row['kode']; ?></td>

                                        <td><?= $row['jenis_roti']; ?></td>
                                        <td><?= $row['jumlah']; ?></td>
                                        <td><?= $row['harga_jual']; ?></td>
                                        <td><?= $row['harga_jual'] * $row['jumlah']; ?></td>
                                        <td>
                                            <a href="/penjualan/edit/<?= $row['id']; ?>" class="badge badge-primary">Edit</a>

                                            <form action="/penjualan/delete/<?= $row['id']; ?>" method="POST" class="d-inline">
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