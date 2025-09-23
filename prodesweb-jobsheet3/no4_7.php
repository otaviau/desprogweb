<?php
$hargaProduk = 120000;
$diskon = 0.20; // 20%

if ($hargaProduk > 100000) {
    $hargaSetelahDiskon = $hargaProduk - ($hargaProduk * $diskon);
    echo "Harga setelah diskon: Rp " . number_format($hargaSetelahDiskon, 0, ',', '.') . "<br>";
} else {
    echo "Harga yang harus dibayar: Rp " . number_format($hargaProduk, 0, ',', '.') . "<br>";
}
?>
