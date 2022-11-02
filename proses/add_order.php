<?php
error_reporting(0);
include ('../koneksi/koneksi.php');

$id_barang  = $_POST['id_barang'];

$cek = mysqli_query($koneksi, "SELECT * FROM barang JOIN stok ON barang.id_barang = stok.id_barang WHERE barang.id_barang = '$id_barang'");
while($c=mysqli_fetch_array($cek)) {
    $sisa = $c['stok_barang'];
    $nama_barang = $c['nama_barang'];
}

$id_akun  = $_POST['id_akun'];
$id_toko  = $_POST['id_toko'];
$variasi  = $_POST['variasi'];
$warna  = $_POST['warna'];
$tipe= $_POST['tipe'];

$sql = mysqli_query($koneksi, "SELECT * FROM cart WHERE id_akun = '$id_akun' AND variasi_cart = '$variasi' OR id_akun = '$id_akun' AND warna_cart = '$warna'");
$cek_barang = mysqli_num_rows($sql);

if ($sisa<=0) {
        echo "<script>alert('Stok Barang ".$nama_barang." Habis');
        location.href='../products.php'</script>";
        return false;
}else {
	if ($cek_barang > 0 && $tipe=="wish") {
		echo "<script>alert('Produk dengan variasi atau warna sudah dipilih, silahkan pilih produk dengan variasi atau warna yang lain');
		location.href='../wishlist.php'</script>";
		return false;
	} elseif ($cek_barang > 0 && $tipe=="products") {
		echo "<script>alert('Produk dengan variasi atau warna sudah dipilih, silahkan pilih produk dengan variasi atau warna yang lain');
		location.href='../products.php'</script>";
		return false;
	} else {
		$query = mysqli_query($koneksi, "INSERT INTO cart (id_barang,id_toko,id_akun,variasi_cart,warna_cart) VALUES ( '$id_barang', '$id_toko', '$id_akun', '$variasi', '$warna')") or die(mysqli_error($koneksi));
		
		if ($query && $tipe=="wish") {
			header("location:../wishlist.php");
		} elseif ($query && $tipe=="products") {
			header("location:../products.php");	
		}
	}
}
?>