<?php
include('../koneksi/koneksi.php');

$username  = $_POST['username'];
$password  = md5($_POST['password']);

$update = mysqli_query ($koneksi,"UPDATE akun SET password='$password' WHERE username='$username' ") or die (mysqli_error());

header('location:../login.php?berhasil_lupa_pass');

?>