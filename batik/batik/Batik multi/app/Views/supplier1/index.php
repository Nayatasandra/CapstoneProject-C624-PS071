<?= $this->extend('supplier1/layout/template'); ?>
<?= $this->section('content'); ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"> <i class="fas fa-fw fa-tachometer-alt"></i> BAGIAN SUPPLIER</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Data Supplier</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=countData('supplier')?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>

                        <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Jenis Barang</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=countData('jenis')?></div>
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
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Satuan Barang</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=countData('ketersediaan')?></div>
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
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Data Barang</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=countData('barangsupplier')?></div>
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
    </div>
</div>

<?= $this->endSection(); ?>