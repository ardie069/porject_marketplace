<?php
include('../koneksi/koneksi.php');

$id_stok = $_POST['id_stok'];
$id_barang = $_POST['id_barang'];
$stok  = $_POST['stok'];
$variasi  = $_POST['variasi'];
$warna  = $_POST['warna'];

$update = mysqli_query ($koneksi,"UPDATE stok SET id_barang='$id_barang', stok_barang='$stok', variasi_stok='$variasi', warna_stok='$warna' WHERE id_stok='$id_stok' ");

header('location:../seller.php');

?>