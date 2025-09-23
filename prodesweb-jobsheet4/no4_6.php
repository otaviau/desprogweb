<?php
$nilaiSiswa = [85, 92, 78, 64, 90, 75, 88, 79, 70, 96];
sort($nilaiSiswa);
$nilaiTengah = array_slice($nilaiSiswa, 2, count($nilaiSiswa) - 4);
$totalNilai = array_sum($nilaiTengah);
echo "Total nilai setelah mengabaikan 2 tertinggi dan 2 terendah: $totalNilai <br>";
$rataRata = $totalNilai / count($nilaiTengah);
echo "Rata-rata nilai: $rataRata";
?>
