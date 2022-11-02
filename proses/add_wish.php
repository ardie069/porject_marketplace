<?php
include ('../koneksi/koneksi.php');

$id_barang  = $_POST['id_barang'];

$sql = mysqli_query($koneksi, "SELECT * FROM wishlist WHERE id_barang = '$id_barang'");
$cek_barang = mysqli_num_rows($sql);

$id_akun  = $_POST['id_akun'];

if ($cek_barang > 0) {
	echo "<script>alert('Produk sudah dipilih, silahkan pilih produk yang lain');
	location.href='../products.php'</script>";
	return false;
} else {	
	$query = mysqli_query($koneksi, "INSERT INTO wishlist (id_barang,id_akun) VALUES ( '$id_barang', '$id_akun')") or die(mysqli_error($koneksi));

	header("location:../products.php");
}
?>