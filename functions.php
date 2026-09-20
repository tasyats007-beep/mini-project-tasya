<?php

// Menghitung nilai stok
function hitungTotalNilaiStok($produk)
{
    return $produk["harga"] * $produk["stok"];
}

// Mengubah angka menjadi format Rupiah
function formatRupiah($angka)
{
    return "Rp " . number_format($angka, 0, ',', '.');
}

// Mengecek apakah stok kritis
function cekStokKritis($stok)
{
    return $stok < 3;
}

// Menghitung total seluruh nilai stok
function hitungTotalAset($katalog)
{
    $total = 0;

    foreach ($katalog as $produk) {
        $total += hitungTotalNilaiStok($produk);
    }

    return $total;
}

?>