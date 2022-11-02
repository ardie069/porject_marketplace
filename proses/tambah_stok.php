<?php
include('../koneksi/koneksi.php');

$id_barang = $_POST['id_barang'];
$stok  = $_POST['stok'];
$variasi  = $_POST['variasi'];
$warna  = $_POST['warna'];

$insert = mysqli_query ($koneksi,"INSERT INTO stok(id_barang,stok_barang,variasi_stok,warna_stok) VALUES('$id_barang', '$stok', '$variasi', '$warna')") or die (mysqli_error());

header('location:../seller.php');

?>