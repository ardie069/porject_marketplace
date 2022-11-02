<?php 
// koneksi database
include ('../koneksi/koneksi.php');
 
// menangkap data id yang di kirim dari url
$id_akun = $_GET['id_akun'];
$id_barang = $_GET['id_barang'];
$id_order = $_GET['id_order'];
$id_toko = $_GET['id_toko'];
$id_kategori = $_GET['id_kategori'];
$tipe= $_GET['tipe'];
 
// menghapus data dari database
if($tipe == "akun"){
	mysqli_query($koneksi,"DELETE FROM akun WHERE id_akun='$id_akun'");
	header("location:../admin/data_member.php");
}
else if($tipe == "barang"){
	mysqli_query($koneksi,"DELETE FROM barang WHERE id_barang='$id_barang'");
	header("location:../admin/data_barang.php");
}
else if($tipe == "order"){
	mysqli_query($koneksi,"DELETE FROM order WHERE id_order='$id_order'");
	header("location:../admin/data_order.php");
}
else if($tipe == "toko"){
	mysqli_query($koneksi,"DELETE FROM toko WHERE id_toko='$id_toko'");
	header("location:../admin/data_toko.php");
}
else if($tipe == "jenis_barang"){
	mysqli_query($koneksi,"DELETE FROM kategori WHERE id_kategori='$id_kategori'");
	header("location:../admin/data_kategori.php");
}
else if($tipe == "produk"){
	mysqli_query($koneksi,"DELETE FROM barang WHERE id_barang='$id_barang'");
	header("location:../seller.php");
}
 
?>
