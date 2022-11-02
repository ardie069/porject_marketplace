<?php 
// koneksi database
include ('../koneksi/koneksi.php');
 
// menangkap data id yang di kirim dari url
$id_wish = $_GET['id_wish'];
$id_cart = $_GET['id_cart'];
$tipe= $_GET['tipe'];
 
// menghapus data dari database
if($tipe == "wish"){
	mysqli_query($koneksi,"DELETE from wishlist where id_wish='$id_wish'");
	header("location:../wishlist.php");
}
else if($tipe == "cart"){
	mysqli_query($koneksi,"DELETE from cart where id_cart='$id_cart'");
	header("location:../cart.php");
}
 
?>
