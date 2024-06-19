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
                                <h3>Laporan Data Produk</h3>
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
                                                <th>Kode</th>
                                                <th>Nama Roti</th>
                                                <th>Jenis</th>
                                                <th>Harga Jual</th>
                                                <th>Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1 ?>

                                            <?php foreach ($laporan as $row) : ?>
                                                <tr>
                                                    <td style="text-align: center;"><?= $i++; ?></td>
                                                    <td style="text-align: center;"><?= $row['kode']; ?></td>
                                                    <td style="text-align: center;"><?= $row['nama']; ?></td>
                                                    <td style="text-align: center;"><?= $row['jenis']; ?></td>
                                                    <td style="text-align: center;"><?= $row['hargaJual']; ?></td>
                                                    <td style="text-align: center;"><?= $row['jumlah']; ?></td>

                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>

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