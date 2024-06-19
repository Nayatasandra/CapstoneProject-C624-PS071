<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
</head>

<body onload="window.print()">
    <center>
        <table style="width: 100%; border-collapse: collapse; text-align: center;" border="1">
            <tr>
                <td>
                    <table style="width: 100%; text-align: center;" border="0">
                        <tr style="text-align: center;">
                            <td>
                                <h1>Batik Soul</h1>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table style="width: 100%; text-align: center;" border="0">
                        <tr style="text-align: center;">
                            <td>
                                <h3>Laporan Penjualan</h3>
                                <br>
                                Tanggal : <?php
                                            date_default_timezone_set('Asia/Jakarta');
                                            echo "<font color='black' face='arial bold'>";
                                            echo date('d-M-Y H:i:s');
                                            echo " WIB";
                                            echo "</font>";
                                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <center>
                                    <table border="1" style="width: 90%; border-collapse: collapse; border: 1px solid #000;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Transaksi</th>
                                                <th>Nama Roti</th>
                                                <th>Jumlah</th>
                                                <th>Harga Jual</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1 ?>
                                            <?php $totalSeluruhHarga = 0 ?>
                                            <?php foreach ($laporan as $row) : ?>
                                                <tr>
                                                    <td style="text-align: center;"><?= $i++; ?></td>
                                                    <td style="text-align: center;"><?= $row['kode']; ?></td>

                                                    <td style="text-align: center;"><?= $row['jenis_roti']; ?></td>
                                                    <td style="text-align: center;"><?= $row['jumlah']; ?></td>
                                                    <td style="text-align: center;"><?= $row['harga_jual']; ?></td>
                                                    <?php $totalHarga = $row['jumlah'] * $row['harga_jual']; ?>
                                                    <td style="text-align: right;"><?= number_format($totalHarga, 0, ",", "."); ?></td>
                                                    <?php $totalSeluruhHarga += $totalHarga ?>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="7">Total Seluruh Penjualan</th>
                                                <td style="text-align: right;"><?= number_format($totalSeluruhHarga, 0, ",", "."); ?></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </center>
                                <br>
                                <br>
                                <br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </center>
</body>

</html>