<?php
include('../koneksi/koneksi.php');

$id_checkout = $_POST['id_checkout'];
$status_order  = $_POST['status_order'];
$tipe  = $_POST['tipe'];

if ($tipe == "admin") {

mysqli_query ($koneksi,"UPDATE checkout SET status_order='$status_order' where id_checkout='$id_checkout' ") or die (mysqli_error());

header('location:../admin/data_order.php');
} elseif ($tipe == "user") {

mysqli_query ($koneksi,"UPDATE checkout SET status_order='$status_order' where id_checkout='$id_checkout' ") or die (mysqli_error());

header('location:../account.php');
} elseif ($tipe == "seller") {

mysqli_query ($koneksi,"UPDATE checkout SET status_order='$status_order' where id_checkout='$id_checkout' ") or die (mysqli_error());

header('location:../seller.php');
}

?>