<?= $this->extend('produksi/layout/template'); ?>
<?= $this->section('content'); ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"> <i class="fas fa-fw fa-tachometer-alt"></i> BAGIAN PRODUKSI</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Data Produk</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= countData('produk') ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-cash-register fa-2x text-gray-300"></i>

                        <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Laporan pemesanan</div>
                        <!-- <div class="h5 mb-0 font-weight-bold text-gray-800"><?= countData('bahan') ?></div> -->
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-cash-register fa-2x text-gray-300"></i>

                        <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Content Row -->
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="text-sm card-header font-weight-bold text-danger text-uppercase mb-1">
                Grafik Transaksi</div>
            <div class="row no-gutters align-items-center">
                <div class="col mr-2" style="padding: 40px;">

                    <div class="h5 mb-0 font-weight-bold text-gray-800"><canvas id="myChart1">
                        </canvas></div>
                </div>

            </div>
        </div>



    </div>

    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="text-sm card-header font-weight-bold text-danger text-uppercase mb-1">
                Grafik Penjualan Produk</div>
            <div class="row no-gutters align-items-center">
                <div class="col mr-2" style="padding: 40px;">

                    <div class="h5 mb-0 font-weight-bold text-gray-800"><canvas id="myChart2">
                        </canvas></div>
                </div>

            </div>
        </div>



    </div>
</div>


<?= $this->endSection(); ?>