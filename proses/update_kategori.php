<?php
include('../koneksi/koneksi.php');

$id_kategori = $_POST['id_kategori'];
$jenis_barang  = $_POST['jenis_barang'];

$update = mysqli_query ($koneksi,"UPDATE kategori SET jenis_barang='$jenis_barang' where id_kategori='$id_kategori' ") or die (mysqli_error());

header('location:../admin/data_kategori.php');

?>