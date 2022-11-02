<?php
session_start();

include('koneksi/koneksi.php');
 
// $data = $_POST['data'];
// $id_barang = $_GET['id_barang'];
$variasi = $_GET['variasi'];
// $warna = $_GET['warna'];
 
// $n=strlen($id_barang);
// $m=($n==2?5:($n==5?8:13));
// $wil=($n==2?'Kota/Kab':($n==5?'Kecamatan':'Desa/Kelurahan'));

	$stok = mysqli_query($koneksi,"SELECT * FROM barang JOIN stok ON barang.id_barang = stok.id_barang WHERE stok.variasi_stok='$variasi'");

	while($d = mysqli_fetch_array($stok)){
		?>
		<p id="stokBarang">Stok barang : <?php echo $d['stok_barang']; ?></p>
		<?php 
	}
?>