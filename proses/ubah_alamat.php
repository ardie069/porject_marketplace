<?php
include('../koneksi/koneksi.php');

$username  = $_POST['username'];
$alamat  = $_POST['alamat'];
$no_telp  = $_POST['no_telp'];

if ($alamat == '') {
	$update = mysqli_query ($koneksi,"UPDATE akun SET no_telp='$no_telp' WHERE username='$username' ") or die (mysqli_error());

	header('location:../account.php');
} elseif ($no_telp == '') {
	$update = mysqli_query ($koneksi,"UPDATE akun SET alamat='$alamat' WHERE username='$username' ") or die (mysqli_error());

	header('location:../account.php');
} else {
	$update = mysqli_query ($koneksi,"UPDATE akun SET alamat='$alamat', no_telp='$no_telp' WHERE username='$username' ") or die (mysqli_error());

	header('location:../account.php');
}



?>