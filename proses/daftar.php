<?php
include ('../koneksi/koneksi.php');

$username  = $_POST['username'];
$password  = md5($_POST['password']);
$nama  = $_POST['nama'];
$status  = $_POST['status'];

$query = mysqli_query($koneksi, "INSERT INTO akun (username,password,nama,status) VALUES ( '$username', '$password', '$nama', 'member')") or die(mysqli_error($koneksi));

if($query) {
	echo "<script>alert('Register Berhasil!');</script>";
    header('location:../login.php');
}
else {
	echo "<script>alert('Register Gagal!');</script>";
    header('location:../registrasi.php');
}

?>