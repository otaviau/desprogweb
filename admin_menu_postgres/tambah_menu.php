<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama_menu = $_POST['nama_menu'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $upload_dir = "images/";

    if (move_uploaded_file($tmp, $upload_dir . $gambar)) {
        $query = "INSERT INTO menu (nama_menu, gambar, harga, deskripsi) VALUES ('$nama_menu', '$gambar', '$harga', '$deskripsi')";
        $result = pg_query($conn, $query);

        if ($result) {
            header("Location: admin_menu.php");
            exit;
        } else {
            echo "Gagal menambah data.";
        }
    } else {
        echo "Upload gambar gagal.";
    }
}
?>