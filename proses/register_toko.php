<?php
include ('../koneksi/koneksi.php');

$id_akun  = $_POST['id_akun'];
$nama_toko  = $_POST['nama_toko'];
$alamat  = $_POST['alamat'];


$query = mysqli_query($koneksi, "INSERT INTO toko (id_akun,nama_toko,alamat_toko) VALUES ('$id_akun', '$nama_toko', '$alamat')") or die(mysqli_error($koneksi));

header('location:../index.php?berhasil_toko');

?>