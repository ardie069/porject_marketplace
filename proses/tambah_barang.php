<?php
include ('../koneksi/koneksi.php');

$id_toko  = $_POST['id_toko'];
$jenis_barang  = $_POST['jenis_barang'];
$nama_barang  = $_POST['nama_barang'];
$harga_barang  = $_POST['harga_barang'];
$deskripsi  = $_POST['deskripsi'];
$variasi  = $_POST['variasi'];
$warna  = $_POST['warna'];

$target = '../img/';
$foto_barang = $_FILES['foto_barang']['name'];

move_uploaded_file($_FILES['foto_barang']['tmp_name'], $target.$foto_barang);
	
$query = mysqli_query($koneksi, "INSERT INTO barang (id_toko,jenis_barang,nama_barang,harga_barang,foto_barang,deskripsi,variasi,warna) VALUES ('$id_toko', '$jenis_barang', '$nama_barang', '$harga_barang', '$foto_barang', '$deskripsi', '$variasi', '$warna')") or die(mysqli_error($koneksi));

header('location:../seller.php');

?>