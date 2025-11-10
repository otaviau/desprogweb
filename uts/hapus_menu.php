<?php
include 'koneksi.php';

if (isset($_POST['hapus'])) {
    $id = $_POST['id'];

    // ambil nama gambar untuk dihapus dari folder
    $q = "SELECT gambar FROM menu WHERE id=$id";
    $res = pg_query($conn, $q);
    $data = pg_fetch_assoc($res);
    $gambar = $data['gambar'];

    if (file_exists("images/$gambar")) {
        unlink("images/$gambar");
    }

    $query = "DELETE FROM menu WHERE id=$id";
    $delete = pg_query($conn, $query);

    if ($delete) {
        header("Location: admin_menu.php");
        exit;
    } else {
        echo "Gagal menghapus data.";
    }
}
?>
