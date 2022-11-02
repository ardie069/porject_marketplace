<?php
include('../koneksi/koneksi.php');

$id_barang = $_POST['id_barang'];
$jenis_barang  = $_POST['jenis_barang'];
$nama_barang  = $_POST['nama_barang'];
$deskripsi  = $_POST['deskripsi'];
$harga_barang  = $_POST['harga_barang'];
$stok_barang  = $_POST['stok_barang'];
$variasi  = $_POST['variasi'];
$warna  = $_POST['warna'];

$target = '../img/';
$foto_barang = $_FILES['foto_barang']['name'];
// Query untuk menampilkan data user berdasarkan id_user yang dikirim

move_uploaded_file($_FILES['foto_barang']['tmp_name'], $target.$foto_barang);

$update = mysqli_query ($koneksi,"UPDATE barang SET jenis_barang='$jenis_barang', nama_barang='$nama_barang', foto_barang='$foto_barang', deskripsi='$deskripsi', harga_barang='$harga_barang', stok_barang='$stok_barang', variasi='$variasi', warna='$warna' WHERE id_barang='$id_barang' ") or die (mysqli_error());

header('location:../seller.php');

?>