<?php
include 'koneksi.php';

if (isset($_POST['ubah'])) {
    $id = $_POST['id'];
    $nama_menu = $_POST['nama_menu'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    // Ambil gambar lama
    $query = "SELECT gambar FROM menu WHERE id=$id";
    $result = pg_query($conn, $query);
    $data = pg_fetch_assoc($result);
    $gambar_lama = $data['gambar'];

    // Cek apakah user upload gambar baru
    if (!empty($_FILES['gambar']['name'])) {
        $gambar = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];
        $upload_dir = "images/";
        if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);
        if (file_exists($upload_dir . $gambar_lama)) unlink($upload_dir . $gambar_lama);
        move_uploaded_file($tmp, $upload_dir . $gambar);
    } else {
        $gambar = $gambar_lama;
    }

    $update = "UPDATE menu SET nama_menu='$nama_menu', gambar='$gambar', harga='$harga', deskripsi='$deskripsi' WHERE id=$id";
    $result = pg_query($conn, $update);

    if ($result) {
        header("Location: admin_menu.php");
        exit;
    } else {
        echo "Gagal mengubah data.";
    }
}
?>
