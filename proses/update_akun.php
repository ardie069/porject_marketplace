<?php
include('../koneksi/koneksi.php');

$id_akun = $_POST['id_akun'];
$nama  = $_POST['nama'];
$email  = $_POST['email'];
$password  = md5($_POST['password']);
$username  = $_POST['username'];
$status  = $_POST['status'];
$jenis_kelamin  = $_POST['jenis_kelamin'];
$tanggal_lahir  = $_POST['tanggal_lahir'];
$alamat  = $_POST['alamat'];
$kota  = $_POST['kota'];
$provinsi  = $_POST['provinsi'];

$query = "SELECT * FROM akun WHERE id_akun='".$id_akun."'";

$sql = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($sql);

$target = '../img/';
$foto = $_FILES['foto']['name'];

$pindah = move_uploaded_file($_FILES['foto']['tmp_name'], $target.$foto);

if ($pindah) {

	if(is_file($target.$data['foto'])) // Jika gambar ada

    unlink($target.$data['foto']); // Hapus file gambar sebelumnya yang ada di folder images

	$update = mysqli_query ($koneksi,"UPDATE akun SET nama='$nama', email='$email', password='$password', username='$username', status='$status', foto='$foto', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir', alamat='$alamat', kota='$kota', provinsi='$provinsi' where id_akun='$id_akun' ") or die (mysqli_error());

	header('location:../admin/data_member.php');
}else {
	echo "Gagal Mengubah!";
}
?>