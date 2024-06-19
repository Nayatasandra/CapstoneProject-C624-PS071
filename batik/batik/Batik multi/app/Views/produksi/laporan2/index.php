<?= $this->extend('layout/template1'); ?>
<?= $this->section('content'); ?>

<!-- Page Heading -->
<!-- <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800"> <i class="fas fa-fw  fa-user-circle"></i> Profile</h1>
</div> -->
<!-- <div class="row">
    <div class="col-6">
        <a href="/laporan" class="btn btn-secondary btn-icon-split mb-3">
            <span class="icon text-white-50">
                <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
    </div>
</div> -->



<div class="card shadow col-lg-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw  fa-user-circle"></i> <?= $title; ?></h6>
    </div>
    <div class="card-body bg-warning">
        <div class="row">
            <div class="col">
                <div class="card text-bg-danger mb-3">
                    <div class="card-header">Pilih Tanggal</div>
                    <div class="card-body">
                        <p class="card-text">
                        <form action="/Laporan2/cetakPengunjungPeriode" action="POST" class="user" target="_blank">
                            <div class="form-group">
                                <label for="tglawal"> Tanggal Awal</label>
                                <input type="date" name="tglawal" id="tglawal" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="tglakhir"> Tanggal Akhir</label>
                                <input type="date" name="tglakhir" id="tglakhir" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-success"><i class="fa fw fa-print"></i> Cetak Laporan</button>
                            </div>
                        </form>
                        </p>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<?= $this->endSection(); ?>