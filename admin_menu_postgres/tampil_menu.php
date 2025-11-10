<?php
include 'koneksi.php';
$query = "SELECT * FROM menu ORDER BY id ASC";
$result = pg_query($conn, $query);
$no = 1;

while ($row = pg_fetch_assoc($result)) {
    echo "<tr>
            <th scope='row'>{$no}</th>
            <td>{$row['nama_menu']}</td>
            <td><img src='images/{$row['gambar']}' class='rounded-2' style='width:50px;'></td>
            <td>Rp" . number_format($row['harga'], 0, ',', '.') . "</td>
            <td>{$row['deskripsi']}</td>
            <td>
                <a href='ubah_menu.php?id={$row['id']}' class='btn btn-warning btn-sm'>Ubah</a>
                <a href='hapus_menu.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin menghapus data?\")'>Hapus</a>
            </td>
        </tr>";
    $no++;
}
?>