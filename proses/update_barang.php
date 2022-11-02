<?php
include('../koneksi/koneksi.php');

$id_barang = $_POST['id_barang'];
$jenis_barang  = $_POST['jenis_barang'];
$nama_barang  = $_POST['nama_barang'];
$deskripsi  = $_POST['deskripsi'];
$harga_barang  = $_POST['harga_barang'];

$target = '../img/';
$foto_barang = $_FILES['foto_barang']['name'];
// Query untuk menampilkan data user berdasarkan id_user yang dikirim

$query = "SELECT * FROM barang WHERE id_barang='".$id_barang."'";

$sql = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($sql);

$pindah = move_uploaded_file($_FILES['foto_barang']['tmp_name'], $target.$foto_barang);

if ($pindah) {

	if(is_file($target.$data['foto_barang'])) // Jika gambar ada

    unlink($target.$data['foto_barang']); // Hapus file gambar sebelumnya yang ada di folder images

	$update = mysqli_query ($koneksi,"UPDATE barang SET jenis_barang='$jenis_barang', nama_barang='$nama_barang', foto_barang='$foto_barang', deskripsi='$deskripsi', harga_barang='$harga_barang' where id_barang='$id_barang' ") or die (mysqli_error());

	header('location:../admin/data_barang.php');
}else {
	echo "Gagal Mengubah!";
}

?>