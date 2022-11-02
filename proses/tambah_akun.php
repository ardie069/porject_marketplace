<?php
include ('../koneksi/koneksi.php');

$username  = $_POST['username'];
$password  = md5($_POST['password']);
$nama  = $_POST['nama'];
$status  = $_POST['status'];

$target = '../img/';
$foto = $_FILES['foto']['name'];

move_uploaded_file($_FILES['foto']['tmp_name'], $target.$foto);

$query = mysqli_query($koneksi, "INSERT INTO akun (username,password,nama,status,foto) VALUES ( '$username', '$password', '$nama', '$status', '$foto')") or die(mysqli_error($koneksi));

header('location:../admin/data_member.php');

?>