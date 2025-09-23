<?php
$a = 10;
$b = 5;

$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$sisaBagi = $a % $b;
$pangkat = $a ** $b;
$hasilSama = $a == $b;

echo "Hasil Tambah: $hasilTambah <p>";
echo "Hasil Kurang: $hasilKurang <p>";
echo "Hasil Kali: $hasilKali <p>";
echo "Hasil Bagi: $hasilBagi <p>";
echo "Sisa Bagi: $sisaBagi <p>";
echo "Pangkat: $pangkat <p>";

$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;
echo "Hasil Sama: " . ($hasilSama ? "true" : "false") . "<p>";
echo "Hasil Tidak Sama: " . ($hasilTidakSama ? "true" : "false") . "<p>";
echo "Hasil Lebih Kecil: " . ($hasilLebihKecil ? "true" : "false") . "<p>";
echo "Hasil Lebih Besar: " . ($hasilLebihBesar ? "true" : "false") . "<p>";
echo "Hasil Lebih Kecil Sama: " . ($hasilLebihKecilSama ? "true" : "false") . "<p>";
echo "Hasil Lebih Besar Sama: " . ($hasilLebihBesarSama ? "true" : "false") . "<p>";

$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;

echo "Hasil And: " . $hasilAnd . "<p>";
echo "Hasil Or: " . $hasilOr . "<p>";
echo "Hasil Not A: " . $hasilNotA . "<p>";
echo "Hasil Not B: " . $hasilNotB . "<p>";

$hasilIdentik = $a === $b;
$hasilTidakIdentik = $a !== $b;

echo "Hasil Indentik: " . $hasilIdentik . "<p>";
echo "Hasil Tidak Indentik: " . $hasilTidakIdentik . "<p>";
?>