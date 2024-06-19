<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->

        <?= $this->include('produksi/layout/sidebar'); ?>

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->

                <?= $this->include('produksi/layout/topbar'); ?>

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- start content -->

                    <?= $this->renderSection('content'); ?>

                    <!-- end content -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->

            <?= $this->include('produksi/layout/footer'); ?>

            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="/login">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/js/demo/chart-area-demo.js"></script>
    <script src="/js/demo/chart-pie-demo.js"></script>

    <!-- Page level plugins -->
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/js/demo/datatables-demo.js"></script>

    <!-- Input file -->
    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    </script>
    <script>
        var ctx = document.getElementById('testing').getContext('2d');

        var testing = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['id', 'Nama', 'Email', 'Alamat', 'Total produk'],
                datasets: [{
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
            }
        });
    </script>

    <?php

    use App\Models\OnlineModel;

    $tmodel = new OnlineModel();
    $order = $tmodel->getAllLaporan();

    $transactionsByDate = [];
    $produkByint = [];
    foreach ($order as $row) {
        $tanggal = $row['tanggal_trans'];
        $produk = $row['total_produk'];


        if (!isset($transactionsByDate[$tanggal])) {
            $transactionsByDate[$tanggal] = 1;
        } else {
            $transactionsByDate[$tanggal]++;
        }
        if (!isset($produkByint[$tanggal])) {
            $produkByint[$tanggal] = 2;
        } else {
            $produkByint[$tanggal]++;
        }
    }


    $uniqueDates = array_keys($transactionsByDate);
    $uniqueDates1 = array_keys($produkByint);

    ?>

    <script>
        const xTgl = [<?php echo implode(',', array_map(function ($date) {
                            return "'$date'";
                        }, $uniqueDates)); ?>];
        const yTransactions = [<?php echo implode(',', array_values($transactionsByDate)); ?>];

        new Chart("myChart1", {
            type: 'line',
            data: {
                labels: xTgl,
                datasets: [{
                    label: 'Jumlah Transaksi',
                    data: yTransactions,
                    backgroundColor: 'rgba(231, 74, 59, 0.2)',
                    borderColor: 'rgba(231, 74, 59, 1)',
                    borderWidth: 1,
                    fill: true
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

    <script>
        const xprdk = [<?php echo implode(',', array_map(function ($date) {
                            return "'$date'";
                        }, $uniqueDates1)); ?>];
        const yProduk = [<?php echo implode(',', array_values($produkByint)); ?>];

        new Chart("myChart2", {
            type: 'line',
            data: {
                labels: xprdk,
                datasets: [{
                    label: 'Jumlah Produk Terjual',
                    data: yProduk,
                    backgroundColor: 'rgba(231, 74, 59, 0.2)',
                    borderColor: 'rgba(231, 74, 59, 1)',
                    borderWidth: 1,
                    fill: true
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>

</html>