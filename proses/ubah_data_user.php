<?php
include('../koneksi/koneksi.php');

$username  = $_POST['username'];
$nama  = $_POST['nama'];
$email  = $_POST['email'];

$query = "SELECT * FROM akun WHERE username='".$username."'";

$sql = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($sql);

$target = '../img/';
$foto = $_FILES['foto']['name'];

move_uploaded_file($_FILES['foto']['tmp_name'], $target.$foto);

if ($nama == " ") {

	if(is_file($target.$data['foto'])) // Jika gambar ada

    unlink($target.$data['foto']); // Hapus file gambar sebelumnya yang ada di folder images

	$update = mysqli_query ($koneksi,"UPDATE akun SET email='$email', foto='$foto' WHERE username='$username' ") or die (mysqli_error());

	header('location:../account.php');

} elseif ($nama == " " && $foto == " ") {

	$update = mysqli_query ($koneksi,"UPDATE akun SET email='$email' WHERE username='$username' ") or die (mysqli_error());

	header('location:../account.php');

} elseif ($email == " " && $foto == " ") {

	$update = mysqli_query ($koneksi,"UPDATE akun SET nama='$nama' WHERE username='$username' ") or die (mysqli_error());

	header('location:../account.php');

} elseif ($email == " " && $nama == " ") {

	if(is_file($target.$data['foto'])) // Jika gambar ada

    unlink($target.$data['foto']); // Hapus file gambar sebelumnya yang ada di folder images

	$update = mysqli_query ($koneksi,"UPDATE akun SET foto='$foto' WHERE username='$username' ") or die (mysqli_error());

	header('location:../account.php');

} elseif ($email == " ") {

	if(is_file($target.$data['foto'])) // Jika gambar ada

    unlink($target.$data['foto']); // Hapus file gambar sebelumnya yang ada di folder images

	$update = mysqli_query ($koneksi,"UPDATE akun SET nama='$nama', foto='$foto' WHERE username='$username' ") or die (mysqli_error());

	header('location:../account.php');

} elseif ($foto == " ") {
	$update = mysqli_query ($koneksi,"UPDATE akun SET nama='$nama', email='$email' WHERE username='$username' ") or die (mysqli_error());

	header('location:../account.php');

} else {

	if(is_file($target.$data['foto'])) // Jika gambar ada

    unlink($target.$data['foto']); // Hapus file gambar sebelumnya yang ada di folder images

	$update = mysqli_query ($koneksi,"UPDATE akun SET nama='$nama', email='$email', foto='$foto' WHERE username='$username' ") or die (mysqli_error());

	header('location:../account.php');
}

?>