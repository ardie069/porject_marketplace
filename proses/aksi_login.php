<?php

session_start();

include '../koneksi/koneksi.php';

$username=$_POST["username"];
$password=md5($_POST["password"]);

// menyeleksi data akun dengan usernamedan password yang sesuai
$login = mysqli_query($koneksi,"SELECT * FROM akun WHERE (username='$username' OR email='$username' OR no_telp='$username') AND password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username/email dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika akun login sebagai admin
	if($data['status']=="admin"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['status'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:../admin/index_admin.php");
 
	// cek jika akun login sebagai member
	}else if($data['status']=="member"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['status'] = "member";
		// alihkan ke halaman dashboard member
		header("location:../index.php?status=member");
	}else if($data['status']=="seller"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['status'] = "seller";
		// alihkan ke halaman dashboard member
		header("location:../index.php?status=seller");
	}else{
 
		// alihkan ke halaman login kembali
		header("location:../login.php?login_error");
	}	
}else{
	header("location:../login.php?login_error");
}
?>