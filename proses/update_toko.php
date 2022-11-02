<?php
include('../koneksi/koneksi.php');

$id_toko = $_POST['id_toko'];
$id_akun  = $_POST['id_akun'];
$nama_toko  = $_POST['nama_toko'];
$alamat_toko  = $_POST['alamat_toko'];

$target = '../img/';
$foto_toko = $_FILES['foto_toko']['name'];
// Query untuk menampilkan data user berdasarkan id_user yang dikirim

move_uploaded_file($_FILES['foto_toko']['tmp_name'], $target.$foto_toko);

$update = mysqli_query ($koneksi,"UPDATE toko SET id_akun='$id_akun', nama_toko='$nama_toko', foto_toko='$foto_toko', alamat_toko='$alamat_toko' WHERE id_toko='$id_toko' ") or die (mysqli_error());

header('location:../seller.php');

?>