<?php

require_once 'products.php';
require_once 'functions.php';

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Product Information System</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f7fb;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .subtitle {
            text-align: center;
            color: #777;
            margin-bottom: 30px;
        }

        .table-box {
            background-color: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background-color: #2f80ed;
            color: white;
            padding: 14px;
            text-align: left;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f5f9ff;
        }

        /* Baris dengan stok kurang dari 3 */
        .stok-kritis {
            background-color: #ffe5e5;
        }

        .status-kritis {
            color: red;
            font-weight: bold;
        }

        .total {
            margin-top: 20px;
            background-color: white;
            padding: 18px;
            border-radius: 10px;
            font-size: 18px;
            font-weight: bold;
        }

    </style>

</head>

<body>

<div class="container">

    <h1>Product Information System</h1>

    <p class="subtitle">
        Sistem Informasi Data Produk
    </p>

    <div class="table-box">

        <table>

            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Deskripsi</th>
                <th>Nilai Stok</th>
            </tr>

            <?php

            $totalNilaiStok = 0;

            foreach ($katalog as $produk):

                $nilaiStok = hitungTotalNilaiStok($produk);

                $totalNilaiStok += $nilaiStok;

                // Mengecek apakah stok kritis
                $stokKritis = $produk["stok"] < 3;

            ?>

                <tr class="<?= $stokKritis ? 'stok-kritis' : '' ?>">

                    <td>
                        <?= $produk["id"] ?>
                    </td>

                    <td>
                        <?= $produk["nama"] ?>
                    </td>

                    <td>
                        <?= $produk["kategori"] ?>
                    </td>

                    <td>
                        Rp <?= number_format($produk["harga"], 0, ',', '.') ?>
                    </td>

                    <td>

                        <?= $produk["stok"] ?>

                        <?php if ($stokKritis): ?>

                            <span class="status-kritis">
                                (Stok Kritis)
                            </span>

                        <?php endif; ?>

                    </td>

                    <td>
                        <?= $produk["deskripsi"] ?>
                    </td>

                    <td>
                        Rp <?= number_format($nilaiStok, 0, ',', '.') ?>
                    </td>

                </tr>

            <?php endforeach; ?>

        </table>

    </div>

    <div class="total">

        Total Nilai Aset Gudang:

        Rp <?= number_format($totalNilaiStok, 0, ',', '.') ?>

    </div>

</div>

</body>

</html>