<?php
$totalKursi = 45;
$kursiTerisi = 28;

$kursiKosong = $totalKursi - $kursiTerisi;
$persenKosong = ($kursiKosong / $totalKursi) * 100;

echo "Total kursi: $totalKursi <p>";
echo "Kursi terisi: $kursiTerisi <p>";
echo "Kursi kosong: $kursiKosong <p>";
echo "Persentase kursi kosong: " . $persenKosong . "<p>";
?>
