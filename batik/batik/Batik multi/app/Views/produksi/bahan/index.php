<?= $this->extend('produksi/layout/template'); ?>
<?= $this->section('content'); ?>

<!-- Page Heading -->
<!-- <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800"> <i class="fas fa-fw  fa-user-circle"></i> Profile</h1>
</div> -->

<div class="row">
    <div class="col-6">
        <a href="/bahan/tambah" class="btn btn-info btn-icon-split mb-3">
            <span class="icon text-white-50">
                <i class="fas fa-plus-circle"></i>
            </span>
            <span class="text">Tambah</span>
        </a>
        <a href="/LBahan/cetakPengunjungPeriode" class="btn btn-danger btn-icon-spli mb-3">
            <span class="icon text-white-50">
                <i class="fas fa-file-pdf"></i>
            </span>
            <span class="text">Cetak Data</span>
        </a>
    </div>
</div>

<?php
$conn = mysqli_connect("localhost", "root", "", "rotiqu_db");
$tambahdata = mysqli_query($conn,"select * from keluar where id");

    while($fetch=mysqli_fetch_array($tambahdata)){
        $kode= $fetch['kode_brg'];
        $barang= $fetch['nama_brg'];
        $stok= $fetch['stok'];
        $id= $fetch['id'];
    ?>
    <div class="alert alert-danger alert-dismissible">
        <strong>Perhatian!</strong> Kode Barang <strong><?=$kode;?></strong> Telah Ditambahkan, Nama Barang,<?=$id;?>
        <strong><?=$barang;?></strong>, Stok<strong><?=$stok;?></strong>
        <button type="button"class="close" data-dismiss="alert">&times;</button>
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
        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw  fa-user-circle"></i> Data Bahan</h6>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama Bahan</th>
                        <th>Satuan</th>
                        <th>Stok</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bahan as $row) : ?>
                        <tr>
                            <td><?= $row['kode']; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['satuan']; ?></td>
                            <td><?= $row['stok']; ?></td>
                            
                            <td>
                                <a href="/bahan/edit/<?= $row['id']; ?>" class="badge badge-primary">Edit</a>

                                <form action="/bahan/delete/<?= $row['id']; ?>" method="POST" class="d-inline">
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