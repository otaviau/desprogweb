<?php
$nilaiSiswa = [
    ['Alice', 85],
    ['Bob', 92],
    ['Charlie', 78],
    ['David', 64],
    ['Eva', 90],
];

$totalNilai = 0;
$jumlahSiswa = count($nilaiSiswa);

foreach ($nilaiSiswa as $siswa) {
    $totalNilai += $siswa[1];
}

$rataRata = $totalNilai / $jumlahSiswa;

echo "Rata-rata nilai: $rataRata <br><br>";
echo "Siswa yang nilainya di atas rata-rata:<br>";

foreach ($nilaiSiswa as $siswa) {
    if ($siswa[1] > $rataRata) {
        echo "Nama: {$siswa[0]}, Nilai: {$siswa[1]} <br>";
    }
}
?>
