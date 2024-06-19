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
                                <h1>Roti-Qu Bakery and Cake</h1>
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
                                <h3>Laporan Persediaan Barang</h3>
                                <br>
                                Periode : <?= $tglawal . " s/d " . $tglakhir; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <center>
                                    <table border="1" style="width: 90%; border-collapse: collapse; border: 1px solid #000;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Id Siswa</th>
                                                <th>Nama Siswa</th>
                                                <th>Kode Kelas</th>
                                                <th>Tanggal Belajar</th>
                                                <th>Durasi (hari)</th>
                                                <th>Total Harga (Rp)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1 ?>
                                            <?php $totalSeluruhHarga = 0 ?>
                                            <?php foreach ($laporan as $row) : ?>
                                                <tr>
                                                    <td style="text-align: center;"><?= $i++; ?></td>
                                                    <td style="text-align: center;"><?= $row['idtamu']; ?></td>
                                                    <td style="text-align: center;"><?= $row['nama']; ?></td>
                                                    <td style="text-align: center;"><?= $row['nokamar']; ?></td>
                                                    <td style="text-align: center;"><?= $row['checkin']; ?></td>
                                                    <td style="text-align: center;"><?= $row['duration']; ?></td>
                                                    <?php $totalHarga = $row['price'] * $row['duration']; ?>
                                                    <td style="text-align: right;"><?= number_format($totalHarga, 0, ",", "."); ?></td>
                                                    <?php $totalSeluruhHarga += $totalHarga ?>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="6">Total Seluruh Harga</th>
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