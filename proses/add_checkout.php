<?php
include ('../koneksi/koneksi.php');
session_start();

// if(isset($_POST['checkout'])){
    // if (! empty($_POST["selected_product"])) {
    //     foreach($_POST["selected_product"] as $product_code) {
        
    //         $productResult = $shoppingCart->getProductByCode($product_code);
            
    //         $cartResult = $shoppingCart->getCartItemByProduct($productResult["id_cart"], $member_id);
            
    //         $shoppingCart->addToCart($productResult["id_cart"], $member_id);
            
    //     }
    // }
if(isset($_POST['delete'])){
    $id_cart = $_POST['id_cart'];
    for($i=0;$i<count($id_cart);$i++){
        mysqli_query($koneksi, "DELETE FROM cart WHERE id_cart='".$id_cart[$i]."'");
    }
    header("location:../cart.php");
}

if(isset($_POST['checkout'])){
    // if (! empty($_POST["selected_product"])) {
    //     foreach($_POST["selected_product"] as $product_code) {
        
    //         $productResult = $shoppingCart->getProductByCode($product_code);
            
    //         $cartResult = $shoppingCart->getCartItemByProduct($productResult["id_cart"], $member_id);
            
    //         $shoppingCart->addToCart($productResult["id_cart"], $member_id);
            
    //     }
    // }

    // $checkbox = $_POST['barang'];
    $id_cart = $_POST['id_cart'];
    $id_akun = $_POST['id_akun'];
    
    // foreach ($_POST['id_barang'] as $barang) {
    for($i=0;$i<count($id_cart);$i++){
        // $id_cart = $barang[$i];

        $id_barang = $_POST['id_barang'][$i];
        $status_order = $_POST['status_order'][$i];
        $id_toko = $_POST['id_toko'][$i];
        $harga_barang = $_POST['harga_barang'][$i];
        $jumlah = $_POST['jumlah'][$i];
        $variasi_order = $_POST['variasi_order'][$i];
        $warna_order = $_POST['warna_order'][$i];

        // $id_barang = $_POST['id_barang'];
        // $id_toko = $_POST['id_toko'];
        // $harga_barang = $_POST['harga_barang'];
        // $jumlah = $_POST['jumlah'];
        // $variasi_order = $_POST['variasi_order'];
        // $warna_order = $_POST['warna_order'];

        $subtotal[$i] = $harga_barang*$jumlah;

        $checkout = mysqli_query($koneksi, "INSERT INTO checkout (id_barang,id_toko,id_akun,variasi_order,warna_order,jumlah,subtotal,status_order) VALUES ( '".$id_barang."', '".$id_toko."', '$id_akun', '".$variasi_order."', '".$warna_order."', '".$jumlah."', '".$subtotal[$i]."', '".$status_order."')") or die(mysqli_error($koneksi));

        $hapus = mysqli_query ($koneksi, "DELETE FROM cart WHERE id_cart='".$id_cart[$i]."'");

        if($checkout&&$hapus){
          header("location:../checkout.php");
        } else {
          echo '<script>alert("Gagal");window.location.href="../cart.php";</script>';
        }
    }
}

?>